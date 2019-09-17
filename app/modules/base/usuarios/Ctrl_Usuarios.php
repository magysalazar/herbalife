<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Usuarios extends Crud_Usuarios {

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
    public function index($view = null, $id = null){
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Obtiene a todos los usuarios
        $oUsuarios = $this->model_usuarios->get();

        $oUsuarios = $this->model_usuarios->getThumbs($oUsuarios);

        $this->data["oUsuarios"] = $oUsuarios;
        // Carga la vista
        return $this->loadView('base/usuarios/index', $view,'id_tipo_usuario');
    }

    public function list($view = null, $id = null){
        list($id, $view) = $this->filterIdOrView($id, $view);

        // Obtiene a todos los usuarios
        $oUsuarios = $this->model_usuarios->get();
        
        $oUsuarios = $this->model_usuarios->getThumbs($oUsuarios);
        
        $this->data["oUsuarios"] = $oUsuarios;
        // Carga la vista
        return $this->loadView('base/usuarios/index', $view,'id_tipo_usuario');
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Optiene un usuario o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oUsuario = $this->model_usuarios->get($id);
            if(!count((array)$oUsuario)){
                $this->data["errors"][] = "El usuario no pudo ser encontrado";
            }
            $rules = $this->model_usuarios->rules_edit;
        } else {
            $rules = $this->model_usuarios->rules;
            $oUsuario = $this->model_usuarios->get_new();
        }

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_usuarios->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        
        $oUsuario = $this->model_usuarios->getThumbs($oUsuario)[0];
        
        $this->data["oUsuario"] = $oUsuario;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

            
            if ( ! $this->model_usuarios->do_upload("foto_perfil", $id) && $id == null) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
                show_error($error);
            } else {
                $file_info = $this->upload->data();
                $this->data["foto_perfil"] = $file_info['file_name'];
                $data['foto_perfil'] = $file_info['file_name'];
            }
            
            
            if($id == NULL){
                $data["password"] = $this->input->post('password');
                $data["password"] = $this->session->hash($data['password']);
            }
            $data['id_club'] = $this->data['idClubSess'];
            if ($error == 'ok') {
                $data = $this->model_usuarios->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'Usuario agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oUsuario'] = $data = $this->model_usuarios->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_usuarios->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("base/usuarios/edit",$this->data,true);
                    $aReturn['redirect'] = 'base/usuarios';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("base/usuarios");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "Usuario con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("base/usuarios/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "base/usuarios/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "Usuario con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('base/usuarios/edit',$view ,'id_tipo_usuario', $error);
    }
    
}