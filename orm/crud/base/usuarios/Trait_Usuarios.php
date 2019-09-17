<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Usuarios extends base_Model {

    public $usuario;

    
             /**
                * The value for the id_usuario field.
                *
                * @var        int
                */             
             public $id_usuario;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the apellido field.
                *
                * @var        string
                */             
             public $apellido;
        
             /**
                * The value for the username field.
                *
                * @var        string
                */             
             public $username;
        
             /**
                * The value for the email field.
                *
                * @var        string
                */             
             public $email;
        
             /**
                * The value for the password field.
                *
                * @var        string
                */             
             public $password;
        
             /**
                * The value for the fec_nacimiento field.
                *
                * @var        string
                */             
             public $fec_nacimiento;
        
             /**
                * The value for the sexo field.
                *
                * @var        string
                */             
             public $sexo;
        
             /**
                * The value for the invitado_por field.
                *
                * @var        int
                */             
             public $invitado_por;
        
             /**
                * The value for the phone_number_1 field.
                *
                * @var        string
                */             
             public $phone_number_1;
        
             /**
                * The value for the phone_number_2 field.
                *
                * @var        string
                */             
             public $phone_number_2;
        
             /**
                * The value for the cellphone_number_1 field.
                *
                * @var        string
                */             
             public $cellphone_number_1;
        
             /**
                * The value for the cellphone_number_2 field.
                *
                * @var        string
                */             
             public $cellphone_number_2;
        
             /**
                * The value for the cod_acceso field.
                *
                * @var        string
                */             
             public $cod_acceso;
        
             /**
                * The value for the id_option_tipo_asociado field.
                *
                * @var        int
                */             
             public $id_option_tipo_asociado;
        
             /**
                * The value for the id_option_nivel_asociado field.
                *
                * @var        int
                */             
             public $id_option_nivel_asociado;
        
             /**
                * The value for the id_club field.
                *
                * @var        int
                */             
             public $id_club;
        
             /**
                * The value for the id_turno field.
                *
                * @var        int
                */             
             public $id_turno;
        
             /**
                * The value for the id_sesion field.
                *
                * @var        int
                */             
             public $id_sesion;
        
             /**
                * The value for the id_opcion_role field.
                *
                * @var        int
                */             
             public $id_opcion_role;
        
             /**
                * The value for the foto_perfil field.
                *
                * @var        int
                */             
             public $foto_perfil;
        
             /**
                * The value for the app_monitor field.
                *
                * @var        string
                */             
             public $app_monitor;
        
             /**
                * The value for the app_orders field.
                *
                * @var        string
                */             
             public $app_orders;
        
             /**
                * The value for the app_admin field.
                *
                * @var        string
                */             
             public $app_admin;
        
             /**
                * The value for the change_count field.
                *
                * @var        int
                */             
             public $change_count;
        
             /**
                * The value for the herbalife_key field.
                *
                * @var        string
                */             
             public $herbalife_key;
        
             /**
                * The value for the id_tipo_usuario field.
                *
                * @var        int
                */             
             public $id_tipo_usuario;
        
             /**
                * The value for the estado field.
                *
                * @var        string
                */             
             public $estado;
        
             /**
                * The value for the date_modified field.
                *
                * @var        string
                */             
             public $date_modified;
        
             /**
                * The value for the date_created field.
                *
                * @var        string
                */             
             public $date_created;
        

    public $rules = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'password' => 
  array (
    'password' => 
    array (
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'trim|max_length[128]|matches[password_confirm]',
    ),
    'password_confirm' => 
    array (
      'field' => 'password_confirm',
      'label' => 'password confirm',
      'rules' => 'trim|matches[password]',
    ),
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'label' => 'Fec_nacimiento',
    'rules' => 'trim|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'label' => 'Invitado por',
    'rules' => 'trim|max_length[10]',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'label' => 'Phone_number_2',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'label' => 'Codigo de acceso',
    'rules' => 'trim|max_length[50]',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'label' => 'Tipo de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'label' => 'Nivel de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club Perteneciente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_opcion_role' => 
  array (
    'field' => 'id_opcion_role',
    'label' => 'Role del usuario',
    'rules' => 'trim|max_length[10]|required',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'label' => 'Permitir app monitoreo',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'label' => 'Permitir app ordenes',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'label' => 'Permitir app administrador',
    'rules' => 'trim|max_length[50]|required',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'label' => 'Herbalife_key',
    'rules' => 'trim|max_length[256]|required',
  ),
  'id_tipo_usuario' => 
  array (
    'field' => 'id_tipo_usuario',
    'label' => 'Tipo de Usuario',
    'rules' => 'trim|max_length[10]',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'label' => 'Fec_nacimiento',
    'rules' => 'trim|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'label' => 'Invitado por',
    'rules' => 'trim|max_length[10]',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'label' => 'Phone_number_2',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'label' => 'Codigo de acceso',
    'rules' => 'trim|max_length[50]',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'label' => 'Tipo de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'label' => 'Nivel de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club Perteneciente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_opcion_role' => 
  array (
    'field' => 'id_opcion_role',
    'label' => 'Role del usuario',
    'rules' => 'trim|max_length[10]|required',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'label' => 'Permitir app monitoreo',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'label' => 'Permitir app ordenes',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'label' => 'Permitir app administrador',
    'rules' => 'trim|max_length[50]|required',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'label' => 'Herbalife_key',
    'rules' => 'trim|max_length[256]|required',
  ),
  'id_tipo_usuario' => 
  array (
    'field' => 'id_tipo_usuario',
    'label' => 'Tipo de Usuario',
    'rules' => 'trim|max_length[10]',
  ),
);
    
    public $rules_edit_draft = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
);
    
    public $rules_edit_tipo_usuario = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]',
  ),
);
    
    public $rules_edit_ini = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'label' => 'Invitado por',
    'rules' => 'trim|max_length[10]',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'label' => 'Tipo de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'label' => 'Nivel de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club Perteneciente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]',
  ),
  'id_opcion_role' => 
  array (
    'field' => 'id_opcion_role',
    'label' => 'Role del usuario',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_tipo_usuario' => 
  array (
    'field' => 'id_tipo_usuario',
    'label' => 'Tipo de Usuario',
    'rules' => 'trim|max_length[10]',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->usuario = new stdClass();

        $this->usuario->id_usuario = '';
            $this->usuario->nombre = '';
            $this->usuario->apellido = '';
            $this->usuario->username = '';
            $this->usuario->email = '';
            $this->usuario->password = '';
            $this->usuario->fec_nacimiento = '';
            $this->usuario->sexo = '';
            $this->usuario->invitado_por = '';
            $this->usuario->phone_number_1 = '';
            $this->usuario->phone_number_2 = '';
            $this->usuario->cellphone_number_1 = '';
            $this->usuario->cellphone_number_2 = '';
            $this->usuario->cod_acceso = '';
            $this->usuario->id_option_tipo_asociado = '';
            $this->usuario->id_option_nivel_asociado = '';
            $this->usuario->id_club = '';
            $this->usuario->id_turno = '';
            $this->usuario->id_sesion = '';
            $this->usuario->id_opcion_role = '';
            $this->usuario->foto_perfil = '';
            $this->usuario->app_monitor = '';
            $this->usuario->app_orders = '';
            $this->usuario->app_admin = '';
            $this->usuario->change_count = '';
            $this->usuario->herbalife_key = '';
            $this->usuario->id_tipo_usuario = '';
            $this->usuario->estado = '';
            $this->usuario->date_modified = '';
            $this->usuario->date_created = '';
            

        return $this->usuario;
    }
}