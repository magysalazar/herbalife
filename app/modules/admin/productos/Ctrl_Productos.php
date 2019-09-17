<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Productos extends Crud_Productos {

    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        if(!self::$instance){
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index(){
        // Obtiene a todos los productos
        $oProductos = $this->model_productos->get();
        
        $oProductos = $this->model_productos->getThumbs($oProductos);
        
        $this->data["oProductos"] = $oProductos;
        // Carga la vista
        return $this->loadView('admin/productos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un producto o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oProducto = $this->model_productos->get($id);
            if(!count((array)$oProducto)){
                $this->data["errors"][] = "El producto no pudo ser encontrado";
            }
            $rules = $this->model_productos->rules_edit;
        } else {
            $rules = $this->model_productos->rules;
            $oProducto = $this->model_productos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_productos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        
        $oProducto = $this->model_productos->getThumbs($oProducto)[0];
        
        $this->data["oProducto"] = $oProducto;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            
            if ( ! $this->model_productos->do_upload("foto_producto", $id) && $id == null) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
                show_error($error);
            } else {
                $file_info = $this->upload->data();
                $this->data["foto_producto"] = $file_info['file_name'];
                $data['foto_producto'] = $file_info['file_name'];
            }
            
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_productos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Producto agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oProducto'] = $data = $this->model_productos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_productos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/productos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/productos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/productos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Producto con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/productos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/productos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Producto con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/productos/edit',$view ,'fieldEditView', $error);
    }
    
}