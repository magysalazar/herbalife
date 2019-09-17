<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Sessions extends base_Controller {

    
    public $usuarios;
    
    public $sesiones;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("base/model_sessions");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_sesiones");
        
        $this->initLoaded();
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        $this->sesiones = $this->model_sesiones->get_by('id_asociado', true);
        
        
        $this->sesiones = $this->model_sesiones->setForeignValues($this->sesiones,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->data['table_name'] = $this->model_sessions->_table_name;
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oSesiones'] = $this->model_sesiones->setOptions($this->sesiones,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_sessions->array_from_post(
                $aFromPost = array (
  0 => 'ip_address',
  1 => 'timestamp',
  2 => 'data',
  3 => 'last_activity',
  4 => 'id_usuario',
  5 => 'id_hbf_sesion',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
            public function login(){
                $this->session->login();
            }
            public function logout(){
                $this->session->logout();
            }
            public function signup(){
                $this->session->signUp();
            }
            
}