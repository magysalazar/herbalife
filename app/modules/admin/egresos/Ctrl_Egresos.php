<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Egresos extends Crud_Egresos {

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
        // Obtiene a todos los egresos
        $oEgresos = $this->model_egresos->get();
        //validateFieldsImgsIndex
        $this->data["oEgresos"] = $oEgresos;
        // Carga la vista
        return $this->loadView('admin/egresos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un egreso o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oEgreso = $this->model_egresos->get($id);
            if(!count((array)$oEgreso)){
                $this->data["errors"][] = "El egreso no pudo ser encontrado";
            }
            $rules = $this->model_egresos->rules_edit;
        } else {
            $rules = $this->model_egresos->rules;
            $oEgreso = $this->model_egresos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_egresos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oEgreso"] = $oEgreso;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_egresos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Egreso agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oEgreso'] = $data = $this->model_egresos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_egresos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/egresos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/egresos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/egresos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Egreso con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/egresos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/egresos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Egreso con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/egresos/edit',$view ,'fieldEditView', $error);
    }
    
}