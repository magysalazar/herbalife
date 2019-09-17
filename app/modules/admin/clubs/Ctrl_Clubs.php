<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Clubs extends Crud_Clubs {

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
        // Obtiene a todos los clubs
        $oClubs = array();
        if($this->oUserLogguedIn->getIdOpcionRole() == 1){
            $oClubs = $this->model_clubs->get();
        } else if($this->oUserLogguedIn->getIdOpcionRole() == 6){
            $oClubs[] = $this->model_clubs->get($this->oUserLogguedIn->getIdClub());
        }
        //validateFieldsImgsIndex
        $this->data["oClubs"] = $oClubs;
        // Carga la vista
        return $this->loadView('admin/clubs/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un club o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oClub = $this->model_clubs->get($id);
            if(!count((array)$oClub)){
                $this->data["errors"][] = "El club no pudo ser encontrado";
            }
            $rules = $this->model_clubs->rules_edit;
        } else {
            $rules = $this->model_clubs->rules;
            $oClub = $this->model_clubs->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_clubs->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oClub"] = $oClub;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_clubs->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Club agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oClub'] = $data = $this->model_clubs->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_clubs->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/clubs/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/clubs';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/clubs");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Club con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/clubs/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/clubs/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Club con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/clubs/edit',$view ,'fieldEditView', $error);
    }
}