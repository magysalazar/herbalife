<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Settings extends Crud_Settings {

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
        // Obtiene a todos los settings
        $oSettings = $this->model_settings->get();
        //validateFieldsImgsIndex
        $this->data["oSettings"] = $oSettings;
        // Carga la vista
        return $this->loadView('base/settings/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un setting o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oSetting = $this->model_settings->get($id);
            if(!count((array)$oSetting)){
                $this->data["errors"][] = "El setting no pudo ser encontrado";
            }
            $rules = $this->model_settings->rules_edit;
        } else {
            $rules = $this->model_settings->rules;
            $oSetting = $this->model_settings->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_settings->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oSetting"] = $oSetting;
        // *********** AGREGAR AL AUTOMATIZADOR *************
        $aDBTables = array_values($this->dbforge->getArrayTableNamesFromDB());
        $this->data['aDBTables'] = array_combine($aDBTables,$aDBTables);
        $this->data['aDBTableRef'] = $oSetting->id_field != null ? [$oSetting->id_field => $oSetting->id_field]: [];
        $this->data['aDBTableFields'] = $oSetting->fields != null ? std2array($oSetting->fields) : [];
        // *********** AGREGAR AL AUTOMATIZADOR *************
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_settings->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Configuraciones del Sistema agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oSetting'] = $data = $this->model_settings->get_by($data,true)[0];

                    $data->primary = $primary = $this->model_settings->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("base/settings/edit",$this->data,true);
                    $aReturn['redirect'] = 'base/settings';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("base/settings");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Configuraciones del Sistema con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("base/settings/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "base/settings/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Configuraciones del Sistema con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('base/settings/edit',$view ,'fieldEditView', $error);
    }
    
}