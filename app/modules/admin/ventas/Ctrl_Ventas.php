<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Ventas extends Crud_Ventas {

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
        // Obtiene a todos los ventas
        $oVentas = $this->model_ventas->get();
        //validateFieldsImgsIndex
        $this->data["oVentas"] = $oVentas;
        // Carga la vista
        return $this->loadView('admin/ventas/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un venta o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oVenta = $this->model_ventas->get($id);
            if(!count((array)$oVenta)){
                $this->data["errors"][] = "El venta no pudo ser encontrado";
            }
            $rules = $this->model_ventas->rules_edit;
        } else {
            $rules = $this->model_ventas->rules;
            $oVenta = $this->model_ventas->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_ventas->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oVenta"] = $oVenta;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_ventas->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Venta agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oVenta'] = $data = $this->model_ventas->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_ventas->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/ventas/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/ventas';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/ventas");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Venta con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/ventas/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/ventas/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Venta con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/ventas/edit',$view ,'fieldEditView', $error);
    }
    
}