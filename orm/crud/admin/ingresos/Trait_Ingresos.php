<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Ingresos extends admin_Model {

    public $ingreso;

    
             /**
                * The value for the id_ingreso field.
                *
                * @var        int
                */             
             public $id_ingreso;
        
             /**
                * The value for the id_cliente field.
                *
                * @var        int
                */             
             public $id_cliente;
        
             /**
                * The value for the id_comanda field.
                *
                * @var        int
                */             
             public $id_comanda;
        
             /**
                * The value for the id_prepago field.
                *
                * @var        int
                */             
             public $id_prepago;
        
             /**
                * The value for the id_producto field.
                *
                * @var        int
                */             
             public $id_producto;
        
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
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Nombre del Cliente',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_prepago' => 
  array (
    'field' => 'id_prepago',
    'label' => 'Prepago',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Producto',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    public $rules_edit = array (
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Nombre del Cliente',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_prepago' => 
  array (
    'field' => 'id_prepago',
    'label' => 'Prepago',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Producto',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->ingreso = new stdClass();

        $this->ingreso->id_ingreso = '';
            $this->ingreso->id_cliente = '';
            $this->ingreso->id_comanda = '';
            $this->ingreso->id_prepago = '';
            $this->ingreso->id_producto = '';
            $this->ingreso->estado = '';
            $this->ingreso->change_count = '';
            $this->ingreso->id_user_modified = '';
            $this->ingreso->id_user_created = '';
            $this->ingreso->date_modified = '';
            $this->ingreso->date_created = '';
            

        return $this->ingreso;
    }
}