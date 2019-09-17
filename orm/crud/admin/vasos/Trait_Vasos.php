<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Vasos extends admin_Model {

    public $vaso;

    
             /**
                * The value for the id_vaso field.
                *
                * @var        int
                */             
             public $id_vaso;
        
             /**
                * The value for the id_comanda field.
                *
                * @var        int
                */             
             public $id_comanda;
        
             /**
                * The value for the nivel field.
                *
                * @var        int
                */             
             public $nivel;
        
             /**
                * The value for the temperatura field.
                *
                * @var        string
                */             
             public $temperatura;
        
             /**
                * The value for the consistencia field.
                *
                * @var        string
                */             
             public $consistencia;
        
             /**
                * The value for the id_opcion_tipo_producto field.
                *
                * @var        int
                */             
             public $id_opcion_tipo_producto;
        
             /**
                * The value for the num_productos field.
                *
                * @var        int
                */             
             public $num_productos;
        
             /**
                * The value for the detalle field.
                *
                * @var        string
                */             
             public $detalle;
        
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
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'label' => 'Nivel del vaso (0% - 100%)',
    'rules' => 'trim|max_length[11]|required',
  ),
  'temperatura' => 
  array (
    'field' => 'temperatura',
    'label' => 'Temperatura',
    'rules' => 'trim|max_length[250]|required',
  ),
  'consistencia' => 
  array (
    'field' => 'consistencia',
    'label' => 'Consistencia',
    'rules' => 'trim|max_length[250]|required',
  ),
  'id_opcion_tipo_producto' => 
  array (
    'field' => 'id_opcion_tipo_producto',
    'label' => 'Tipos de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_productos' => 
  array (
    'field' => 'num_productos',
    'label' => 'Numero de Productos',
    'rules' => 'trim|max_length[11]',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[500]',
  ),
);
    public $rules_edit = array (
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'label' => 'Nivel del vaso (0% - 100%)',
    'rules' => 'trim|max_length[11]|required',
  ),
  'temperatura' => 
  array (
    'field' => 'temperatura',
    'label' => 'Temperatura',
    'rules' => 'trim|max_length[250]|required',
  ),
  'consistencia' => 
  array (
    'field' => 'consistencia',
    'label' => 'Consistencia',
    'rules' => 'trim|max_length[250]|required',
  ),
  'id_opcion_tipo_producto' => 
  array (
    'field' => 'id_opcion_tipo_producto',
    'label' => 'Tipos de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_productos' => 
  array (
    'field' => 'num_productos',
    'label' => 'Numero de Productos',
    'rules' => 'trim|max_length[11]',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[500]',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->vaso = new stdClass();

        $this->vaso->id_vaso = '';
            $this->vaso->id_comanda = '';
            $this->vaso->nivel = '';
            $this->vaso->temperatura = '';
            $this->vaso->consistencia = '';
            $this->vaso->id_opcion_tipo_producto = '';
            $this->vaso->num_productos = '';
            $this->vaso->detalle = '';
            $this->vaso->estado = '';
            $this->vaso->change_count = '';
            $this->vaso->id_user_modified = '';
            $this->vaso->id_user_created = '';
            $this->vaso->date_modified = '';
            $this->vaso->date_created = '';
            

        return $this->vaso;
    }
}