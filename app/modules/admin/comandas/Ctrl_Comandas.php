<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 05/07/2018
 * Time: 6:19 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Comandas extends Crud_Comandas {

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
        // Obtiene a todos los comandas
        $oComandas = $this->model_comandas->get();
        $oComandas = $this->model_clubs->setForeignFields($this->clubs,'id_club',$oComandas,'id_club', true);
        $oComandas = $this->model_turnos->setForeignFields($this->turnos,'id_turno',$oComandas,'id_turno', true);
        $oComandas = $this->model_sesiones->setForeignFields($this->sesiones,'id_sesion',$oComandas,'id_sesion', true);
        $oComandas = $this->model_usuarios->setForeignFields($this->usuarios,'id_usuario',$oComandas,'id_cliente', true);

        //validateFieldsImgsIndex
        $this->data["oComandas"] = $oComandas;
        // Carga la vista
        return $this->loadView('admin/comandas/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un comanda o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oComanda = $this->model_comandas->get($id);
            if(!count((array)$oComanda)){
                $this->data["errors"][] = "La comanda no pudo ser encontrado";
            }
            $rules = $this->model_comandas->rules_edit;
        } else {
            $rules = $this->model_comandas->rules;
            $oComanda = $this->model_comandas->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_comandas->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $oComanda->id_club = $oComanda->id_club == "" ? $this->data['idClubSess'] : $oComanda->id_club;
        $oComanda->id_turno = $oComanda->id_turno == "" ? $this->data['idTurnoSess'] : $oComanda->id_turno;
        $oComanda->id_sesion = $oComanda->id_sesion == "" ? $this->data['idSesionSess'] : $oComanda->id_sesion;
        $this->data["oComanda"] = $oComanda;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_comandas->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Comanda agregada exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oComanda'] = $data = $this->model_comandas->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_comandas->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/comandas/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/comandas';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/comandas");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Comanda con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/comandas/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/comandas/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Comanda con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/comandas/edit',$view ,'fieldEditView', $error);
    }
}


