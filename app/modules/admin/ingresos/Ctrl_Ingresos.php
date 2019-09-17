<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Ingresos extends Crud_Ingresos {

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
        // Obtiene a todos los ingresos
        $oIngresos = $this->model_ingresos->get();
        //validateFieldsImgsIndex
        $this->data["oIngresos"] = $oIngresos;
        // Carga la vista
        return $this->loadView('admin/ingresos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un ingreso o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oIngreso = $this->model_ingresos->get($id);
            if(!count((array)$oIngreso)){
                $this->data["errors"][] = "El ingreso no pudo ser encontrado";
            }
            $rules = $this->model_ingresos->rules_edit;
        } else {
            $rules = $this->model_ingresos->rules;
            $oIngreso = $this->model_ingresos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_ingresos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oIngreso"] = $oIngreso;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_ingresos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Ingreso agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oIngreso'] = $data = $this->model_ingresos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_ingresos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/ingresos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/ingresos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/ingresos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Ingreso con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/ingresos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/ingresos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Ingreso con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/ingresos/edit',$view ,'fieldEditView', $error);
    }
    
}