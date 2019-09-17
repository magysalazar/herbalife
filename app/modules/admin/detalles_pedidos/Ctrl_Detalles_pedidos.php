<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Detalles_pedidos extends Crud_Detalles_pedidos {

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
        // Obtiene a todos los detalles_pedidos
        $oDetalles_pedidos = $this->model_detalles_pedidos->get();
        $oDetalles_pedidos = $this->model_comandas->setForeignFields($this->comandas,'id_comanda',$oDetalles_pedidos,'id_comanda', true);
        $oDetalles_pedidos = $this->model_vasos->setForeignFields($this->vasos,'id_vaso',$oDetalles_pedidos,'id_vaso', true);
        //validateFieldsImgsIndex
        $this->data["oDetalles_pedidos"] = $oDetalles_pedidos;
        // Carga la vista
        return $this->loadView('admin/detalles_pedidos/index');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        $this->data['secondSegment'] = $this->uri->segment(2);

        // Optiene un detalle_pedido o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oDetalle_pedido = $this->model_detalles_pedidos->get($id);

            if(!count((array)$oDetalle_pedido)){
                $this->data["errors"][] = "El detalle_pedido no pudo ser encontrado";
            }
            $rules = $this->model_detalles_pedidos->rules_edit;
        } else {
            $rules = $this->model_detalles_pedidos->rules;
            $oDetalle_pedido = $this->model_detalles_pedidos->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_detalles_pedidos->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oDetalle_pedido"] = $oDetalle_pedido;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $data = $this->model_detalles_pedidos->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Detalles de Pedidos agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oDetalle_pedido'] = $data = $this->model_detalles_pedidos->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_detalles_pedidos->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("admin/detalles_pedidos/edit",$this->data,true);
                    $aReturn['redirect'] = 'admin/detalles_pedidos';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("admin/detalles_pedidos");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Detalles de Pedidos con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("admin/detalles_pedidos/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "admin/detalles_pedidos/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Detalles de Pedidos con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('admin/detalles_pedidos/edit',$view ,'fieldEditView', $error);
    }
    
}