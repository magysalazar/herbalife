<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Prepagos extends Crud_Prepagos {

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
        // Obtiene a todos los prepagos
        $oPrepagos = $this->model_prepagos->get();
        //validateFieldsImgsIndex
        $this->data["oPrepagos"] = $oPrepagos;
        // Carga la vista
        return $this->loadView('admin/prepagos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un prepago o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oPrepago = $this->model_prepagos->get($id);
            if(!count((array)$oPrepago)){
                $this->data["errors"][] = "El prepago no pudo ser encontrado";
            }
            $rules = $this->model_prepagos->rules_edit;
        } else {
            $rules = $this->model_prepagos->rules;
            $oPrepago = $this->model_prepagos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_prepagos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oPrepago"] = $oPrepago;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_prepagos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Prepago agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oPrepago'] = $data = $this->model_prepagos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_prepagos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/prepagos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/prepagos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/prepagos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Prepago con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/prepagos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/prepagos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Prepago con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/prepagos/edit',$view ,'fieldEditView', $error);
    }
    
}