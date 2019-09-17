<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Egresos extends admin_Model {

    public $egreso;

    
             /**
                * The value for the id_egreso field.
                *
                * @var        int
                */             
             public $id_egreso;
        
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
                * The value for the id_cliente field.
                *
                * @var        int
                */             
             public $id_cliente;
        
             /**
                * The value for the detalle field.
                *
                * @var        string
                */             
             public $detalle;
        
             /**
                * The value for the tipo_egreso field.
                *
                * @var        string
                */             
             public $tipo_egreso;
        
             /**
                * The value for the fecha_egreso field.
                *
                * @var        string
                */             
             public $fecha_egreso;
        
             /**
                * The value for the monto field.
                *
                * @var        
                */             
             public $monto;
        
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
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Cliente',
    'rules' => 'trim|max_length[10]',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[500]|required',
  ),
  'tipo_egreso' => 
  array (
    'field' => 'tipo_egreso',
    'label' => 'Tipo de Egreso',
    'rules' => 'trim|max_length[10]|required',
  ),
  'fecha_egreso' => 
  array (
    'field' => 'fecha_egreso',
    'label' => 'Fecha_egreso',
    'rules' => 'trim|required',
  ),
  'monto' => 
  array (
    'field' => 'monto',
    'label' => 'Monto',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Cliente',
    'rules' => 'trim|max_length[10]',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[500]|required',
  ),
  'tipo_egreso' => 
  array (
    'field' => 'tipo_egreso',
    'label' => 'Tipo de Egreso',
    'rules' => 'trim|max_length[10]|required',
  ),
  'fecha_egreso' => 
  array (
    'field' => 'fecha_egreso',
    'label' => 'Fecha_egreso',
    'rules' => 'trim|required',
  ),
  'monto' => 
  array (
    'field' => 'monto',
    'label' => 'Monto',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->egreso = new stdClass();

        $this->egreso->id_egreso = '';
            $this->egreso->id_club = '';
            $this->egreso->id_turno = '';
            $this->egreso->id_sesion = '';
            $this->egreso->id_cliente = '';
            $this->egreso->detalle = '';
            $this->egreso->tipo_egreso = '';
            $this->egreso->fecha_egreso = '';
            $this->egreso->monto = '';
            $this->egreso->estado = '';
            $this->egreso->change_count = '';
            $this->egreso->id_user_modified = '';
            $this->egreso->id_user_created = '';
            $this->egreso->date_modified = '';
            $this->egreso->date_created = '';
            

        return $this->egreso;
    }
}