<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Vasos extends Crud_Vasos {

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
        // Obtiene a todos los vasos
        $oVasos = $this->model_vasos->get();
        $oVasos = $this->model_comandas->setForeignFields($this->comandas,'id_comanda',$oVasos,'id_comanda', true);
//        $oVasos = $this->model_productos->setForeignFields($this->opcionTipoProducto,'id_opcion_tipo_producto',$oVasos,'id_opcion', true);
        //validateFieldsImgsIndex
        $this->data["oVasos"] = $oVasos;
        // Carga la vista
        return $this->loadView('admin/vasos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un vaso o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oVaso = $this->model_vasos->get($id);
            if(!count((array)$oVaso)){
                $this->data["errors"][] = "El vaso no pudo ser encontrado";
            }
            $rules = $this->model_vasos->rules_edit;
        } else {
            $rules = $this->model_vasos->rules;
            $oVaso = $this->model_vasos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_vasos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oVaso"] = $oVaso;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_vasos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Vaso agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oVaso'] = $data = $this->model_vasos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_vasos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/vasos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/vasos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/vasos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Vaso con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/vasos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/vasos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Vaso con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/vasos/edit',$view ,'fieldEditView', $error);
    }
    
}