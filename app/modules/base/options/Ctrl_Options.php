<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Options extends Crud_Options {

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
        // Obtiene a todos los options
        $oOptions = $this->model_options->get();
        //validateFieldsImgsIndex
        $this->data["oOptions"] = $oOptions;
        // Carga la vista
        return $this->loadView('base/options/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un option o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oOption = $this->model_options->get($id);
            if(!count((array)$oOption)){
                $this->data["errors"][] = "El option no pudo ser encontrado";
            }
            $rules = $this->model_options->rules_edit;
        } else {
            $rules = $this->model_options->rules;
            $oOption = $this->model_options->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_options->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oOption"] = $oOption;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_options->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Opciones del Sistema agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oOption'] = $data = $this->model_options->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_options->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("base/options/edit",$this->data,true);
                    $aReturn['redirect'] = 'base/options';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("base/options");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Opciones del Sistema con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("base/options/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "base/options/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Opciones del Sistema con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('base/options/edit',$view ,'id_setting', $error);
    }
    
}