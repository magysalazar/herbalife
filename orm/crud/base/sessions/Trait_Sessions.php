<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Sessions extends base_Model {

    public $session;

    
             /**
                * The value for the id field.
                *
                * @var        string
                */             
             public $id;
        
             /**
                * The value for the ip_address field.
                *
                * @var        string
                */             
             public $ip_address;
        
             /**
                * The value for the timestamp field.
                *
                * @var        int
                */             
             public $timestamp;
        
             /**
                * The value for the data field.
                *
                * @var        
                */             
             public $data;
        
             /**
                * The value for the last_activity field.
                *
                * @var        string
                */             
             public $last_activity;
        
             /**
                * The value for the id_usuario field.
                *
                * @var        int
                */             
             public $id_usuario;
        
             /**
                * The value for the id_hbf_sesion field.
                *
                * @var        int
                */             
             public $id_hbf_sesion;
        

    public $rules = array (
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'label' => 'Ip_address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Datos en sesion',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'label' => 'Last_activity',
    'rules' => 'trim|required',
  ),
  'id_usuario' => 
  array (
    'field' => 'id_usuario',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'label' => 'Ip_address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Datos en sesion',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'label' => 'Last_activity',
    'rules' => 'trim|required',
  ),
  'id_usuario' => 
  array (
    'field' => 'id_usuario',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->session = new stdClass();

        $this->session->id = '';
            $this->session->ip_address = '';
            $this->session->timestamp = '';
            $this->session->data = '';
            $this->session->last_activity = '';
            $this->session->id_usuario = '';
            $this->session->id_hbf_sesion = '';
            

        return $this->session;
    }
}