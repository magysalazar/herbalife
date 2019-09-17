<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Porciones extends Crud_Porciones {

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
        // Obtiene a todos los porciones
        $oPorciones = $this->model_porciones->get();
        //validateFieldsImgsIndex
        $this->data["oPorciones"] = $oPorciones;
        // Carga la vista
        return $this->loadView('admin/porciones/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un porcion o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oPorcion = $this->model_porciones->get($id);
            if(!count((array)$oPorcion)){
                $this->data["errors"][] = "El porcion no pudo ser encontrado";
            }
            $rules = $this->model_porciones->rules_edit;
        } else {
            $rules = $this->model_porciones->rules;
            $oPorcion = $this->model_porciones->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_porciones->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oPorcion"] = $oPorcion;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_porciones->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Porcion agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oPorcion'] = $data = $this->model_porciones->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_porciones->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/porciones/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/porciones';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/porciones");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Porcion con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/porciones/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/porciones/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Porcion con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/porciones/edit',$view ,'fieldEditView', $error);
    }
    
}