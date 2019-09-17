<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Clubs extends admin_Model {

    public $club;

    
             /**
                * The value for the id_club field.
                *
                * @var        int
                */             
             public $id_club;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the email field.
                *
                * @var        string
                */             
             public $email;
        
             /**
                * The value for the direccion field.
                *
                * @var        string
                */             
             public $direccion;
        
             /**
                * The value for the licencia field.
                *
                * @var        string
                */             
             public $licencia;
        
             /**
                * The value for the direccion_gps field.
                *
                * @var        string
                */             
             public $direccion_gps;
        
             /**
                * The value for the ids_miembros field.
                *
                * @var        string
                */             
             public $ids_miembros;
        
             /**
                * The value for the ids_turnos field.
                *
                * @var        string
                */             
             public $ids_turnos;
        
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
    'rules' => 'trim|max_length[100]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]|required',
  ),
  'direccion' => 
  array (
    'field' => 'direccion',
    'label' => 'Direccion',
    'rules' => 'trim|max_length[200]|required',
  ),
  'licencia' => 
  array (
    'field' => 'licencia',
    'label' => 'Licencia',
    'rules' => 'trim|max_length[100]|required',
  ),
  'direccion_gps' => 
  array (
    'field' => 'direccion_gps',
    'label' => 'Direccion_gps',
    'rules' => 'trim|max_length[100]',
  ),
  'ids_miembros' => 
  array (
    'field' => 'ids_miembros',
    'label' => 'Agregar Miembros',
    'rules' => 'trim|max_length[500]',
  ),
  'ids_turnos' => 
  array (
    'field' => 'ids_turnos',
    'label' => 'Agregar Turnos',
    'rules' => 'trim|max_length[500]',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[100]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]|required',
  ),
  'direccion' => 
  array (
    'field' => 'direccion',
    'label' => 'Direccion',
    'rules' => 'trim|max_length[200]|required',
  ),
  'licencia' => 
  array (
    'field' => 'licencia',
    'label' => 'Licencia',
    'rules' => 'trim|max_length[100]|required',
  ),
  'direccion_gps' => 
  array (
    'field' => 'direccion_gps',
    'label' => 'Direccion_gps',
    'rules' => 'trim|max_length[100]',
  ),
  'ids_miembros' => 
  array (
    'field' => 'ids_miembros',
    'label' => 'Agregar Miembros',
    'rules' => 'trim|max_length[500]',
  ),
  'ids_turnos' => 
  array (
    'field' => 'ids_turnos',
    'label' => 'Agregar Turnos',
    'rules' => 'trim|max_length[500]',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->club = new stdClass();

        $this->club->id_club = '';
            $this->club->nombre = '';
            $this->club->email = '';
            $this->club->direccion = '';
            $this->club->licencia = '';
            $this->club->direccion_gps = '';
            $this->club->ids_miembros = '';
            $this->club->ids_turnos = '';
            $this->club->estado = '';
            $this->club->change_count = '';
            $this->club->id_user_modified = '';
            $this->club->id_user_created = '';
            $this->club->date_modified = '';
            $this->club->date_created = '';
            

        return $this->club;
    }
}