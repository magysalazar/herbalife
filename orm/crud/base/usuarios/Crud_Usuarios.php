<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Usuarios extends base_Controller {

    
    public $settings;
    
    public $usuarios;
    
    public $optionTipoAsociado;
    
    public $clubs;
    
    public $turnos;
    
    public $sesiones;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("base/model_usuarios");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("base/model_options");
        
        $this->load->model("admin/model_clubs");
        
        $this->load->model("admin/model_turnos");
        
        $this->load->model("admin/model_sesiones");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
  3 => ['id_opcion_role' => [6,7,1]]

), true);
        
        $this->optionTipoAsociado = $this->model_options->get_by(array (
  'id_setting' => 2,
  0 => 'nombre',
), true);
        
        $this->optionNivelAsociado = $this->model_options->get_by(array (
  'id_setting' => 3,
  0 => 'nombre',
), true);
        
        $this->clubs = $this->model_clubs->get_by(array (
  0 => 'nombre',
), true);
        
        $this->turnos = $this->model_turnos->get_by(array(
            'id_asociado'
        ), true);
        
        $this->sesiones = $this->model_sesiones->get_by(array (
  0 => 'id_asociado',
), true);
        
        $this->opcionRole = $this->model_options->get_by(array (
  'id_setting' => 4,
  0 => 'nombre',
), true);
        
        $this->tipoUsuario = $this->model_options->get_by(array (
  'id_setting' => 5,
  0 => 'nombre',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->optionTipoAsociado = $this->model_options->setForeignValues($this->optionTipoAsociado,'id_setting',$this->settings,'id_setting');
        
        $this->optionNivelAsociado = $this->model_options->setForeignValues($this->optionNivelAsociado,'id_setting',$this->settings,'id_setting');
        
        $this->turnos = $this->model_turnos->setForeignValues($this->turnos,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->sesiones = $this->model_sesiones->setForeignValues($this->sesiones,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->opcionRole = $this->model_options->setForeignValues($this->opcionRole,'id_setting',$this->settings,'id_setting');
        
        $this->tipoUsuario = $this->model_options->setForeignValues($this->tipoUsuario,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_usuarios->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oOptionTipoAsociado'] = $this->model_options->setOptions($this->optionTipoAsociado,',');
        
        $this->data['oOptionNivelAsociado'] = $this->model_options->setOptions($this->optionNivelAsociado,',');
        
        $this->data['oClubs'] = $this->model_clubs->setOptions($this->clubs,',');
        
        $this->data['oTurnos'] = $this->model_turnos->setOptions($this->turnos,',');
        
        $this->data['oSesiones'] = $this->model_sesiones->setOptions($this->sesiones,',');
        
        $this->data['oOpcionRole'] = $this->model_options->setOptions($this->opcionRole,',');
        
        $this->data['oTipoUsuario'] = $this->model_options->setOptions($this->tipoUsuario,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_usuarios->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'apellido',
  2 => 'username',
  3 => 'email',
  4 => 'fec_nacimiento',
  5 => 'sexo',
  6 => 'invitado_por',
  7 => 'phone_number_1',
  8 => 'phone_number_2',
  9 => 'cellphone_number_1',
  10 => 'cellphone_number_2',
  11 => 'cod_acceso',
  12 => 'id_option_tipo_asociado',
  13 => 'id_option_nivel_asociado',
  14 => 'id_club',
  15 => 'id_turno',
  16 => 'id_sesion',
  17 => 'id_opcion_role',
  18 => 'app_monitor',
  19 => 'app_orders',
  20 => 'app_admin',
  21 => 'herbalife_key',
  22 => 'id_tipo_usuario',
)
            );
        }
        
        else if(compareStrStr($view, 'draft')){
            $data = $this->model_usuarios->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'apellido',
  2 => 'sexo',
)
            );
        }
        
        else if(compareStrStr($view, 'cliente')){
            $data = $this->model_usuarios->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'apellido',
  2 => 'sexo',
  3 => 'cellphone_number_1',
  4 => 'id_turno',
  5 => 'id_sesion',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}