<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Sessions extends Crud_Sessions {

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
        // Obtiene a todos los sessions
        $oSessions = $this->model_sessions->get();
        //validateFieldsImgsIndex
        $this->data["oSessions"] = $oSessions;
        // Carga la vista
        return $this->loadView('base/sessions/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un session o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oSession = $this->model_sessions->get($id);
            if(!count((array)$oSession)){
                $this->data["errors"][] = "El session no pudo ser encontrado";
            }
            $rules = $this->model_sessions->rules_edit;
        } else {
            $rules = $this->model_sessions->rules;
            $oSession = $this->model_sessions->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_sessions->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oSession"] = $oSession;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_sessions->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Sesiones del Sistema agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oSession'] = $data = $this->model_sessions->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_sessions->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("base/sessions/edit",$this->data,true);
                    $aReturn['redirect'] = 'base/sessions';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("base/sessions");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Sesiones del Sistema con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("base/sessions/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "base/sessions/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Sesiones del Sistema con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('base/sessions/edit',$view ,'fieldEditView', $error);
    }
    
            public function login(){
                $this->session->login();
            }
            public function logout(){
                $this->session->logout();
            }
            public function signup(){
                $this->session->signUp();
            }
            
}