<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Comandas extends admin_Model {

    public $comanda;

    
             /**
                * The value for the id_comanda field.
                *
                * @var        int
                */             
             public $id_comanda;
        
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
                * The value for the ids_vasos field.
                *
                * @var        string
                */             
             public $ids_vasos;
        
             /**
                * The value for the importe field.
                *
                * @var        
                */             
             public $importe;
        
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
                * The value for the prioridad field.
                *
                * @var        string
                */             
             public $prioridad;
        
             /**
                * The value for the hora_entrega field.
                *
                * @var        
                */             
             public $hora_entrega;
        
             /**
                * The value for the tipo_consumo field.
                *
                * @var        string
                */             
             public $tipo_consumo;
        
             /**
                * The value for the comentarios field.
                *
                * @var        string
                */             
             public $comentarios;
        
             /**
                * The value for the id_ficha_prepago field.
                *
                * @var        int
                */             
             public $id_ficha_prepago;
        
             /**
                * The value for the pagado field.
                *
                * @var        string
                */             
             public $pagado;
        
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
    'label' => 'Nombre del Club',
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
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Nombre del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'ids_vasos' => 
  array (
    'field' => 'ids_vasos',
    'label' => 'Agregar Vasos',
    'rules' => 'trim|max_length[250]',
  ),
  'importe' => 
  array (
    'field' => 'importe',
    'label' => 'Importe',
    'rules' => 'trim|max_length[10]',
  ),
  'a_cuenta' => 
  array (
    'field' => 'a_cuenta',
    'label' => 'A_cuenta',
    'rules' => 'trim|max_length[10]',
  ),
  'saldo' => 
  array (
    'field' => 'saldo',
    'label' => 'Saldo',
    'rules' => 'trim|max_length[10]',
  ),
  'prioridad' => 
  array (
    'field' => 'prioridad',
    'label' => 'Prioridad',
    'rules' => 'trim|max_length[500]',
  ),
  'hora_entrega' => 
  array (
    'field' => 'hora_entrega',
    'label' => 'Hora_entrega',
    'rules' => 'trim',
  ),
  'tipo_consumo' => 
  array (
    'field' => 'tipo_consumo',
    'label' => 'Tipo de Consumo',
    'rules' => 'trim|max_length[500]|required',
  ),
  'comentarios' => 
  array (
    'field' => 'comentarios',
    'label' => 'Comentarios',
    'rules' => 'trim',
  ),
  'id_ficha_prepago' => 
  array (
    'field' => 'id_ficha_prepago',
    'label' => 'Ficha Prepago',
    'rules' => 'trim|max_length[10]',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Estado de la comanda',
    'rules' => 'trim|max_length[10]',
  ),
);
    public $rules_edit = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Nombre del Club',
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
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'label' => 'Nombre del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'ids_vasos' => 
  array (
    'field' => 'ids_vasos',
    'label' => 'Agregar Vasos',
    'rules' => 'trim|max_length[250]',
  ),
  'importe' => 
  array (
    'field' => 'importe',
    'label' => 'Importe',
    'rules' => 'trim|max_length[10]',
  ),
  'a_cuenta' => 
  array (
    'field' => 'a_cuenta',
    'label' => 'A_cuenta',
    'rules' => 'trim|max_length[10]',
  ),
  'saldo' => 
  array (
    'field' => 'saldo',
    'label' => 'Saldo',
    'rules' => 'trim|max_length[10]',
  ),
  'prioridad' => 
  array (
    'field' => 'prioridad',
    'label' => 'Prioridad',
    'rules' => 'trim|max_length[500]',
  ),
  'hora_entrega' => 
  array (
    'field' => 'hora_entrega',
    'label' => 'Hora_entrega',
    'rules' => 'trim',
  ),
  'tipo_consumo' => 
  array (
    'field' => 'tipo_consumo',
    'label' => 'Tipo de Consumo',
    'rules' => 'trim|max_length[500]|required',
  ),
  'comentarios' => 
  array (
    'field' => 'comentarios',
    'label' => 'Comentarios',
    'rules' => 'trim',
  ),
  'id_ficha_prepago' => 
  array (
    'field' => 'id_ficha_prepago',
    'label' => 'Ficha Prepago',
    'rules' => 'trim|max_length[10]',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Estado de la comanda',
    'rules' => 'trim|max_length[10]',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->comanda = new stdClass();

        $this->comanda->id_comanda = '';
            $this->comanda->id_club = '';
            $this->comanda->id_turno = '';
            $this->comanda->id_sesion = '';
            $this->comanda->id_cliente = '';
            $this->comanda->ids_vasos = '';
            $this->comanda->importe = '';
            $this->comanda->a_cuenta = '';
            $this->comanda->saldo = '';
            $this->comanda->prioridad = '';
            $this->comanda->hora_entrega = '';
            $this->comanda->tipo_consumo = '';
            $this->comanda->comentarios = '';
            $this->comanda->id_ficha_prepago = '';
            $this->comanda->pagado = '';
            $this->comanda->estado = '';
            $this->comanda->change_count = '';
            $this->comanda->id_user_modified = '';
            $this->comanda->id_user_created = '';
            $this->comanda->date_modified = '';
            $this->comanda->date_created = '';
            

        return $this->comanda;
    }
}