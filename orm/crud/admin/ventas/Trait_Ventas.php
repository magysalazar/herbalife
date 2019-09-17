<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Ventas extends admin_Model {

    public $venta;

    
             /**
                * The value for the id_venta field.
                *
                * @var        int
                */             
             public $id_venta;
        
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
                * The value for the fecha_venta field.
                *
                * @var        string
                */             
             public $fecha_venta;
        
             /**
                * The value for the id_producto field.
                *
                * @var        int
                */             
             public $id_producto;
        
             /**
                * The value for the precio field.
                *
                * @var        
                */             
             public $precio;
        
             /**
                * The value for the observaciones field.
                *
                * @var        string
                */             
             public $observaciones;
        
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
                * The value for the entregado field.
                *
                * @var        string
                */             
             public $entregado;
        
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
                * @var        int
                */             
             public $date_modified;
        
             /**
                * The value for the date_created field.
                *
                * @var        int
                */             
             public $date_created;
        

    public $rules = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club',
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
    'rules' => 'trim|max_length[10]|required',
  ),
  'fecha_venta' => 
  array (
    'field' => 'fecha_venta',
    'label' => 'Fecha_venta',
    'rules' => 'trim|required',
  ),
  'id_producto[]' => 
  array (
    'field' => 'id_producto[]',
    'label' => 'Producto',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'label' => 'Precio',
    'rules' => 'trim|max_length[10]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[600]|required',
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
  'entregado' => 
  array (
    'field' => 'entregado',
    'label' => 'Fue Entregado?',
    'rules' => 'trim|max_length[10]|required',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Fue Pagado?',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Club',
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
    'rules' => 'trim|max_length[10]|required',
  ),
  'fecha_venta' => 
  array (
    'field' => 'fecha_venta',
    'label' => 'Fecha_venta',
    'rules' => 'trim|required',
  ),
  'id_producto[]' => 
  array (
    'field' => 'id_producto[]',
    'label' => 'Producto',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'label' => 'Precio',
    'rules' => 'trim|max_length[10]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[600]|required',
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
  'entregado' => 
  array (
    'field' => 'entregado',
    'label' => 'Fue Entregado?',
    'rules' => 'trim|max_length[10]|required',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'label' => 'Fue Pagado?',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->venta = new stdClass();

        $this->venta->id_venta = '';
            $this->venta->id_club = '';
            $this->venta->id_turno = '';
            $this->venta->id_sesion = '';
            $this->venta->id_cliente = '';
            $this->venta->fecha_venta = '';
            $this->venta->id_producto = '';
            $this->venta->precio = '';
            $this->venta->observaciones = '';
            $this->venta->a_cuenta = '';
            $this->venta->saldo = '';
            $this->venta->entregado = '';
            $this->venta->pagado = '';
            $this->venta->estado = '';
            $this->venta->change_count = '';
            $this->venta->id_user_modified = '';
            $this->venta->id_user_created = '';
            $this->venta->date_modified = '';
            $this->venta->date_created = '';
            

        return $this->venta;
    }
}