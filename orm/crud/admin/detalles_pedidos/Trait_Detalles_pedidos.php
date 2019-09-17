<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Detalles_pedidos extends admin_Model {

    public $detalle_pedido;

    
             /**
                * The value for the id_detalle_pedido field.
                *
                * @var        int
                */             
             public $id_detalle_pedido;
        
             /**
                * The value for the id_comanda field.
                *
                * @var        int
                */             
             public $id_comanda;
        
             /**
                * The value for the id_vaso field.
                *
                * @var        int
                */             
             public $id_vaso;
        
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
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda del Cliente',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_vaso' => 
  array (
    'field' => 'id_vaso',
    'label' => 'Vaso del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Producto',
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
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'label' => 'Comanda del Cliente',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_vaso' => 
  array (
    'field' => 'id_vaso',
    'label' => 'Vaso del Cliente',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'label' => 'Producto',
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
        $this->detalle_pedido = new stdClass();

        $this->detalle_pedido->id_detalle_pedido = '';
            $this->detalle_pedido->id_comanda = '';
            $this->detalle_pedido->id_vaso = '';
            $this->detalle_pedido->id_producto = '';
            $this->detalle_pedido->cantidad = '';
            $this->detalle_pedido->estado = '';
            $this->detalle_pedido->change_count = '';
            $this->detalle_pedido->id_user_modified = '';
            $this->detalle_pedido->id_user_created = '';
            $this->detalle_pedido->date_modified = '';
            $this->detalle_pedido->date_created = '';
            

        return $this->detalle_pedido;
    }
}