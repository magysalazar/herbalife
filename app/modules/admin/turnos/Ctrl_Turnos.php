<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Turnos extends Crud_Turnos {

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
        // Obtiene a todos los turnos
        $oTurnos = $this->model_turnos->get();
        //validateFieldsImgsIndex
        $this->data["oTurnos"] = $oTurnos;
        // Carga la vista
        return $this->loadView('admin/turnos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un turno o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oTurno = $this->model_turnos->get($id);
            if(!count((array)$oTurno)){
                $this->data["errors"][] = "El turno no pudo ser encontrado";
            }
            $rules = $this->model_turnos->rules_edit;
        } else {
            $rules = $this->model_turnos->rules;
            $oTurno = $this->model_turnos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_turnos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex

        $oTurno->id_club = $oTurno->id_club == "" ? $this->data['idClubSess'] : $oTurno->id_club;
        $this->data["oTurno"] = $oTurno;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_turnos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Turno agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oTurno'] = $data = $this->model_turnos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_turnos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/turnos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/turnos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/turnos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Turno con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/turnos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/turnos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Turno con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/turnos/edit',$view ,'id_opcion_turnos', $error);
    }
    
}