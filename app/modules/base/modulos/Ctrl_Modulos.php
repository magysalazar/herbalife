<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Modulos extends Crud_Modulos {

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
        // Obtiene a todos los modulos
        $oModulos = $this->model_modulos->get();
        //validateFieldsImgsIndex
        $this->data["oModulos"] = $oModulos;
        // Carga la vista
        return $this->loadView('base/modulos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un modulo o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oModulo = $this->model_modulos->get($id);
            if(!count((array)$oModulo)){
                $this->data["errors"][] = "El modulo no pudo ser encontrado";
            }
            $rules = $this->model_modulos->rules_edit;
        } else {
            $rules = $this->model_modulos->rules;
            $oModulo = $this->model_modulos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_modulos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oModulo"] = $oModulo;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_modulos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Modulo agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oModulo'] = $data = $this->model_modulos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_modulos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("base/modulos/edit",$this->data,true);
                    $aReturn['redirect'] = 'base/modulos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("base/modulos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Modulo con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("base/modulos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "base/modulos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Modulo con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('base/modulos/edit',$view ,'fieldEditView', $error);
    }
    
}