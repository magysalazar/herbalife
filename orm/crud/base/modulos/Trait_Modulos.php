<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:04 am
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Modulos extends base_Model {

    public $modulo;

    
             /**
                * The value for the id_modulo field.
                *
                * @var        int
                */             
             public $id_modulo;
        
             /**
                * The value for the id_opcion_modulo field.
                *
                * @var        int
                */             
             public $id_opcion_modulo;
        
             /**
                * The value for the id_opcion_roles field.
                *
                * @var        int
                */             
             public $id_opcion_roles;
        
             /**
                * The value for the titulo field.
                *
                * @var        string
                */             
             public $titulo;
        
             /**
                * The value for the tabla field.
                *
                * @var        string
                */             
             public $tabla;
        
             /**
                * The value for the listed field.
                *
                * @var        string
                */             
             public $listed;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the icon field.
                *
                * @var        string
                */             
             public $icon;
        
             /**
                * The value for the url field.
                *
                * @var        string
                */             
             public $url;
        
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
  'id_opcion_modulo' => 
  array (
    'field' => 'id_opcion_modulo',
    'label' => 'Modulo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_opcion_roles' => 
  array (
    'field' => 'id_opcion_roles',
    'label' => 'Role Admitido',
    'rules' => 'trim|max_length[10]|required',
  ),
  'titulo' => 
  array (
    'field' => 'titulo',
    'label' => 'Titulo',
    'rules' => 'trim|max_length[100]|required',
  ),
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[255]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[600]|required',
  ),
);
    public $rules_edit = array (
  'id_opcion_modulo' => 
  array (
    'field' => 'id_opcion_modulo',
    'label' => 'Modulo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_opcion_roles' => 
  array (
    'field' => 'id_opcion_roles',
    'label' => 'Role Admitido',
    'rules' => 'trim|max_length[10]|required',
  ),
  'titulo' => 
  array (
    'field' => 'titulo',
    'label' => 'Titulo',
    'rules' => 'trim|max_length[100]|required',
  ),
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[255]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[600]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->modulo = new stdClass();

        $this->modulo->id_modulo = '';
            $this->modulo->id_opcion_modulo = '';
            $this->modulo->id_opcion_roles = '';
            $this->modulo->titulo = '';
            $this->modulo->tabla = '';
            $this->modulo->listed = '';
            $this->modulo->descripcion = '';
            $this->modulo->icon = '';
            $this->modulo->url = '';
            $this->modulo->estado = '';
            $this->modulo->change_count = '';
            $this->modulo->id_user_modified = '';
            $this->modulo->id_user_created = '';
            $this->modulo->date_modified = '';
            $this->modulo->date_created = '';
            

        return $this->modulo;
    }
}