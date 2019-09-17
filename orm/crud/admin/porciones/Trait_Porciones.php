<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Porciones extends admin_Model {

    public $porcion;

    
             /**
                * The value for the id_porcion field.
                *
                * @var        int
                */             
             public $id_porcion;
        
             /**
                * The value for the id_producto field.
                *
                * @var        int
                */             
             public $id_producto;
        
             /**
                * The value for the cantidad field.
                *
                * @var        int
                */             
             public $cantidad;
        
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
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'cantidad' => 
  array (
    'field' => 'cantidad',
    'label' => 'Cantidad',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    public $rules_edit = array (
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'cantidad' => 
  array (
    'field' => 'cantidad',
    'label' => 'Cantidad',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->porcion = new stdClass();

        $this->porcion->id_porcion = '';
            $this->porcion->id_producto = '';
            $this->porcion->cantidad = '';
            $this->porcion->estado = '';
            $this->porcion->change_count = '';
            $this->porcion->id_user_modified = '';
            $this->porcion->id_user_created = '';
            $this->porcion->date_modified = '';
            $this->porcion->date_created = '';
            

        return $this->porcion;
    }
}