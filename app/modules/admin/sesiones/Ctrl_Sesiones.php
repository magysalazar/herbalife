<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Sesiones extends Crud_Sesiones {

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
        // Obtiene a todos los sesiones

        $oSesiones = $this->model_sesiones->get();
        //validateFieldsImgsIndex
        $this->data["oSesiones"] = $oSesiones;
        // Carga la vista
        return $this->loadView('admin/sesiones/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un sesion o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oSesion = $this->model_sesiones->get($id);
            if(!count((array)$oSesion)){
                $this->data["errors"][] = "El sesion no pudo ser encontrado";
            }
            $rules = $this->model_sesiones->rules_edit;
        } else {
            $rules = $this->model_sesiones->rules;
            $oSesion = $this->model_sesiones->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_sesiones->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $oSesion->id_turno = $oSesion->id_turno == "" ? $this->data['idTurnoSess'] : $oSesion->id_turno;
        $oSesion->id_club = $oSesion->id_club == "" ? $this->data['idClubSess'] : $oSesion->id_club;
        $this->data["oSesion"] = $oSesion;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_sesiones->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Sesion agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oSesion'] = $data = $this->model_sesiones->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_sesiones->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/sesiones/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/sesiones';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/sesiones");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Sesion con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/sesiones/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/sesiones/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Sesion con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/sesiones/edit',$view ,'id_opcion_sesion', $error);
    }
    
}