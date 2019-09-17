<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Turnos extends admin_Model {

    public $turno;

    
             /**
                * The value for the id_turno field.
                *
                * @var        int
                */             
             public $id_turno;
        
             /**
                * The value for the id_club field.
                *
                * @var        int
                */             
             public $id_club;
        
             /**
                * The value for the id_asociado field.
                *
                * @var        int
                */             
             public $id_asociado;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the fec_inicio field.
                *
                * @var        string
                */             
             public $fec_inicio;
        
             /**
                * The value for the fec_fin field.
                *
                * @var        string
                */             
             public $fec_fin;
        
             /**
                * The value for the horario_desde field.
                *
                * @var        
                */             
             public $horario_desde;
        
             /**
                * The value for the horario_hasta field.
                *
                * @var        
                */             
             public $horario_hasta;
        
             /**
                * The value for the total_consumos field.
                *
                * @var        int
                */             
             public $total_consumos;
        
             /**
                * The value for the id_opcion_turnos field.
                *
                * @var        int
                */             
             public $id_opcion_turnos;
        
             /**
                * The value for the change_count field.
                *
                * @var        int
                */             
             public $change_count;
        
             /**
                * The value for the estado field.
                *
                * @var        string
                */             
             public $estado;
        
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
    'label' => 'Nombre del Club',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Asociado a cargo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'fec_inicio' => 
  array (
    'field' => 'fec_inicio',
    'label' => 'Fecha de Inicio',
    'rules' => 'trim',
  ),
  'fec_fin' => 
  array (
    'field' => 'fec_fin',
    'label' => 'Fecha de Cierre',
    'rules' => 'trim',
  ),
  'horario_desde' => 
  array (
    'field' => 'horario_desde',
    'label' => 'hora de inicio',
    'rules' => 'trim',
  ),
  'horario_hasta' => 
  array (
    'field' => 'horario_hasta',
    'label' => 'Hora de Cierre',
    'rules' => 'trim',
  ),
  'total_consumos' => 
  array (
    'field' => 'total_consumos',
    'label' => 'Total de consumos',
    'rules' => 'trim|max_length[11]',
  ),
  'id_opcion_turnos' => 
  array (
    'field' => 'id_opcion_turnos',
    'label' => 'Turno con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Nombre del Club',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Asociado a cargo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'fec_inicio' => 
  array (
    'field' => 'fec_inicio',
    'label' => 'Fecha de Inicio',
    'rules' => 'trim',
  ),
  'fec_fin' => 
  array (
    'field' => 'fec_fin',
    'label' => 'Fecha de Cierre',
    'rules' => 'trim',
  ),
  'horario_desde' => 
  array (
    'field' => 'horario_desde',
    'label' => 'hora de inicio',
    'rules' => 'trim',
  ),
  'horario_hasta' => 
  array (
    'field' => 'horario_hasta',
    'label' => 'Hora de Cierre',
    'rules' => 'trim',
  ),
  'total_consumos' => 
  array (
    'field' => 'total_consumos',
    'label' => 'Total de consumos',
    'rules' => 'trim|max_length[11]',
  ),
  'id_opcion_turnos' => 
  array (
    'field' => 'id_opcion_turnos',
    'label' => 'Turno con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    
    public $rules_edit_ini = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Nombre del Club',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Asociado a cargo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'fec_inicio' => 
  array (
    'field' => 'fec_inicio',
    'label' => 'Fecha de Inicio',
    'rules' => 'trim',
  ),
  'id_opcion_turnos' => 
  array (
    'field' => 'id_opcion_turnos',
    'label' => 'Turno con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->turno = new stdClass();

        $this->turno->id_turno = '';
            $this->turno->id_club = '';
            $this->turno->id_asociado = '';
            $this->turno->descripcion = '';
            $this->turno->fec_inicio = '';
            $this->turno->fec_fin = '';
            $this->turno->horario_desde = '';
            $this->turno->horario_hasta = '';
            $this->turno->total_consumos = '';
            $this->turno->id_opcion_turnos = '';
            $this->turno->change_count = '';
            $this->turno->estado = '';
            $this->turno->id_user_modified = '';
            $this->turno->id_user_created = '';
            $this->turno->date_modified = '';
            $this->turno->date_created = '';
            

        return $this->turno;
    }
}