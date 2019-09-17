<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Settings extends base_Model {

    public $setting;

    
             /**
                * The value for the id_setting field.
                *
                * @var        int
                */             
             public $id_setting;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the tabla field.
                *
                * @var        string
                */             
             public $tabla;
        
             /**
                * The value for the id_field field.
                *
                * @var        string
                */             
             public $id_field;
        
             /**
                * The value for the fields field.
                *
                * @var        string
                */             
             public $fields;
        
             /**
                * The value for the edit_tag field.
                *
                * @var        string
                */             
             public $edit_tag;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
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
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[250]|required',
  ),
  'id_field' => 
  array (
    'field' => 'id_field',
    'label' => 'Columna Referencia',
    'rules' => 'trim|max_length[250]',
  ),
  'fields[]' => 
  array (
    'field' => 'fields[]',
    'label' => 'Columnas',
    'rules' => 'trim|max_length[800]',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[500]|required',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[250]|required',
  ),
  'id_field' => 
  array (
    'field' => 'id_field',
    'label' => 'Columna Referencia',
    'rules' => 'trim|max_length[250]',
  ),
  'fields[]' => 
  array (
    'field' => 'fields[]',
    'label' => 'Columnas',
    'rules' => 'trim|max_length[800]',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'label' => 'Edit_tag',
    'rules' => 'trim|max_length[250]',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[500]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->setting = new stdClass();

        $this->setting->id_setting = '';
            $this->setting->nombre = '';
            $this->setting->tabla = '';
            $this->setting->id_field = '';
            $this->setting->fields = '';
            $this->setting->edit_tag = '';
            $this->setting->descripcion = '';
            $this->setting->estado = '';
            $this->setting->change_count = '';
            $this->setting->id_user_modified = '';
            $this->setting->id_user_created = '';
            $this->setting->date_modified = '';
            $this->setting->date_created = '';
            

        return $this->setting;
    }
}