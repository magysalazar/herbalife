<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Options extends base_Model {

    public $option;

    
             /**
                * The value for the id_option field.
                *
                * @var        int
                */             
             public $id_option;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the id_setting field.
                *
                * @var        int
                */             
             public $id_setting;
        
             /**
                * The value for the nivel field.
                *
                * @var        string
                */             
             public $nivel;
        
             /**
                * The value for the precio field.
                *
                * @var        
                */             
             public $precio;
        
             /**
                * The value for the num_fichas field.
                *
                * @var        int
                */             
             public $num_fichas;
        
             /**
                * The value for the id_modulo field.
                *
                * @var        int
                */             
             public $id_modulo;
        
             /**
                * The value for the edit_tag field.
                *
                * @var        string
                */             
             public $edit_tag;
        
             /**
                * The value for the estado field.
                *
                * @var        string
                */             
             public $estado;
        
             /**
                * The value for the change_count field.
                *
                * @var        int
                */             
             public $change_count;
        
             /**
                * The value for the id_user_modified field.
                *
                * @var        int
                */             
             public $id_user_modified;
        
             /**
                * The value for the id_user_created field.
                *
                * @var        int
                */             
             public $id_user_created;
        
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
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'label' => 'Nivel de usuario',
    'rules' => 'trim|max_length[200]|required',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'label' => 'Precio',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_fichas' => 
  array (
    'field' => 'num_fichas',
    'label' => 'Num_fichas',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'label' => 'Id_modulo',
    'rules' => 'trim|max_length[11]|required',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]|required',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'label' => 'Nivel de usuario',
    'rules' => 'trim|max_length[200]|required',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'label' => 'Precio',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_fichas' => 
  array (
    'field' => 'num_fichas',
    'label' => 'Num_fichas',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'label' => 'Id_modulo',
    'rules' => 'trim|max_length[11]|required',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]|required',
  ),
);
    
    public $rules_edit_roles = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'label' => 'Nivel de usuario',
    'rules' => 'trim|max_length[200]|required',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]|required',
  ),
);
    
    public $rules_edit_prepagos = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'label' => 'Precio',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_fichas' => 
  array (
    'field' => 'num_fichas',
    'label' => 'Num_fichas',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    
    public $rules_edit_modulos = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'label' => 'Id_modulo',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    
    public $rules_edit_tipo_asociado = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    
    public $rules_edit_nivel_asociado = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    
    public $rules_edit_tipo_usuario = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]|required',
  ),
);
    
    public $rules_edit_tipo_producto = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    
    public $rules_edit_categoria_producto = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[250]',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'label' => 'Opcion para',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->option = new stdClass();

        $this->option->id_option = '';
            $this->option->nombre = '';
            $this->option->descripcion = '';
            $this->option->id_setting = '';
            $this->option->nivel = '';
            $this->option->precio = '';
            $this->option->num_fichas = '';
            $this->option->id_modulo = '';
            $this->option->edit_tag = '';
            $this->option->estado = '';
            $this->option->change_count = '';
            $this->option->id_user_modified = '';
            $this->option->id_user_created = '';
            $this->option->date_modified = '';
            $this->option->date_created = '';
            

        return $this->option;
    }
}