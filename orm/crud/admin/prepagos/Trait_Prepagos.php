<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Prepagos extends admin_Model {

    public $prepago;

    
             /**
                * The value for the id_prepago field.
                *
                * @var        int
                */             
             public $id_prepago;
        
             /**
                * The value for the id_cliente field.
                *
                * @var        int
                */             
             public $id_cliente;
        
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
                * The value for the fichas_total field.
                *
                * @var        int
                */             
             public $fichas_total;
        
             /**
                * The value for the fichas_usadas field.
                *
                * @var        int
                */             
             public $fichas_usadas;
        
             /**
                * The value for the fichas_gratis field.
                *
                * @var        int
                */             
             public $fichas_gratis;
        
             /**
                * The value for the fichas_restantes field.
                *
                * @var        int
                */             
             public $fichas_restantes;
        
             /**
                * The value for the id_option_tipo_prepago field.
                *
                * @var        int
                */             
             public $id_option_tipo_prepago;
        
             /**
                * The value for the a_cuenta field.
                *
                * @var        
                */             
             public $a_cuenta;
        
             /**
                * The value for the saldo field.
                *
                * @var        
                */             
             public $saldo;
        
             /**
                * The value for the importe field.
                *
                * @var        
                */             
             public $importe;
        
             /**
                * The value for the pagado field.
                *
                * @var        string
                */             
             public $pagado;
        
             /**
                * The value for the finalizado field.
                *
                * @var        string
                */             
             public $finalizado;
        
             /**
                * The value for the observaciones field.
                *
                * @var        int
                */             
             public $observaciones;
        
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
                * The value for the id_user_created field.
                *
                * @var        int
                */             
             public $id_user_created;
        
             /**
                * The value for the id_user_modified field.
                *
                * @var        int
                */             
             public $id_user_modified;
        
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
    'label' => 'Cliente',
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
  'fichas_total' => 
  array (
    'field' => 'fichas_total',
    'label' => 'Fichas_total',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_usadas' => 
  array (
    'field' => 'fichas_usadas',
    'label' => 'Fichas_usadas',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_gratis' => 
  array (
    'field' => 'fichas_gratis',
    'label' => 'Fichas_gratis',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_restantes' => 
  array (
    'field' => 'fichas_restantes',
    'label' => 'Fichas_restantes',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_option_tipo_prepago' => 
  array (
    'field' => 'id_option_tipo_prepago',
    'label' => 'Tipo de Prepago',
    'rules' => 'trim|max_length[10]|required',
  ),
  'a_cuenta' => 
  array (
    'field' => 'a_cuenta',
    'label' => 'A_cuenta',
    'rules' => 'trim|max_length[10]|required',
  ),
  'saldo' => 
  array (
    'field' => 'saldo',
    'label' => 'Saldo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'importe' => 
  array (
    'field' => 'importe',
    'label' => 'Importe',
    'rules' => 'trim|max_length[10]|required',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Pagado',
    'rules' => 'trim|max_length[50]|required',
  ),
  'finalizado' => 
  array (
    'field' => 'finalizado',
    'label' => 'Finalizado',
    'rules' => 'trim|max_length[50]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    public $rules_edit = array (
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Cliente',
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
  'fichas_total' => 
  array (
    'field' => 'fichas_total',
    'label' => 'Fichas_total',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_usadas' => 
  array (
    'field' => 'fichas_usadas',
    'label' => 'Fichas_usadas',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_gratis' => 
  array (
    'field' => 'fichas_gratis',
    'label' => 'Fichas_gratis',
    'rules' => 'trim|max_length[11]|required',
  ),
  'fichas_restantes' => 
  array (
    'field' => 'fichas_restantes',
    'label' => 'Fichas_restantes',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_option_tipo_prepago' => 
  array (
    'field' => 'id_option_tipo_prepago',
    'label' => 'Tipo de Prepago',
    'rules' => 'trim|max_length[10]|required',
  ),
  'a_cuenta' => 
  array (
    'field' => 'a_cuenta',
    'label' => 'A_cuenta',
    'rules' => 'trim|max_length[10]|required',
  ),
  'saldo' => 
  array (
    'field' => 'saldo',
    'label' => 'Saldo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'importe' => 
  array (
    'field' => 'importe',
    'label' => 'Importe',
    'rules' => 'trim|max_length[10]|required',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Pagado',
    'rules' => 'trim|max_length[50]|required',
  ),
  'finalizado' => 
  array (
    'field' => 'finalizado',
    'label' => 'Finalizado',
    'rules' => 'trim|max_length[50]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->prepago = new stdClass();

        $this->prepago->id_prepago = '';
            $this->prepago->id_cliente = '';
            $this->prepago->id_turno = '';
            $this->prepago->id_sesion = '';
            $this->prepago->fichas_total = '';
            $this->prepago->fichas_usadas = '';
            $this->prepago->fichas_gratis = '';
            $this->prepago->fichas_restantes = '';
            $this->prepago->id_option_tipo_prepago = '';
            $this->prepago->a_cuenta = '';
            $this->prepago->saldo = '';
            $this->prepago->importe = '';
            $this->prepago->pagado = '';
            $this->prepago->finalizado = '';
            $this->prepago->observaciones = '';
            $this->prepago->estado = '';
            $this->prepago->change_count = '';
            $this->prepago->id_user_created = '';
            $this->prepago->id_user_modified = '';
            $this->prepago->date_modified = '';
            $this->prepago->date_created = '';
            

        return $this->prepago;
    }
}