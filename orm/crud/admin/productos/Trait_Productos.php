<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Productos extends admin_Model {

    public $producto;

    
             /**
                * The value for the id_producto field.
                *
                * @var        int
                */             
             public $id_producto;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the id_option_tipo_producto field.
                *
                * @var        int
                */             
             public $id_option_tipo_producto;
        
             /**
                * The value for the id_option_categoria_producto field.
                *
                * @var        int
                */             
             public $id_option_categoria_producto;
        
             /**
                * The value for the foto_producto field.
                *
                * @var        string
                */             
             public $foto_producto;
        
             /**
                * The value for the precio_venta field.
                *
                * @var        
                */             
             public $precio_venta;
        
             /**
                * The value for the precio_porcion field.
                *
                * @var        
                */             
             public $precio_porcion;
        
             /**
                * The value for the precio_compra field.
                *
                * @var        
                */             
             public $precio_compra;
        
             /**
                * The value for the num_porciones field.
                *
                * @var        int
                */             
             public $num_porciones;
        
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
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'id_option_tipo_producto' => 
  array (
    'field' => 'id_option_tipo_producto',
    'label' => 'Tipos de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_categoria_producto' => 
  array (
    'field' => 'id_option_categoria_producto',
    'label' => 'Categorias de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_venta' => 
  array (
    'field' => 'precio_venta',
    'label' => 'Precio de ventra',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_porcion' => 
  array (
    'field' => 'precio_porcion',
    'label' => 'Precio de una porcion',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_compra' => 
  array (
    'field' => 'precio_compra',
    'label' => 'Precio de Compra',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_porciones' => 
  array (
    'field' => 'num_porciones',
    'label' => 'Numero de Porciones',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[100]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim',
  ),
  'id_option_tipo_producto' => 
  array (
    'field' => 'id_option_tipo_producto',
    'label' => 'Tipos de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_categoria_producto' => 
  array (
    'field' => 'id_option_categoria_producto',
    'label' => 'Categorias de Productos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_venta' => 
  array (
    'field' => 'precio_venta',
    'label' => 'Precio de ventra',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_porcion' => 
  array (
    'field' => 'precio_porcion',
    'label' => 'Precio de una porcion',
    'rules' => 'trim|max_length[10]|required',
  ),
  'precio_compra' => 
  array (
    'field' => 'precio_compra',
    'label' => 'Precio de Compra',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_porciones' => 
  array (
    'field' => 'num_porciones',
    'label' => 'Numero de Porciones',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->producto = new stdClass();

        $this->producto->id_producto = '';
            $this->producto->nombre = '';
            $this->producto->descripcion = '';
            $this->producto->id_option_tipo_producto = '';
            $this->producto->id_option_categoria_producto = '';
            $this->producto->foto_producto = '';
            $this->producto->precio_venta = '';
            $this->producto->precio_porcion = '';
            $this->producto->precio_compra = '';
            $this->producto->num_porciones = '';
            $this->producto->estado = '';
            $this->producto->change_count = '';
            $this->producto->id_user_modified = '';
            $this->producto->id_user_created = '';
            $this->producto->date_modified = '';
            $this->producto->date_created = '';
            

        return $this->producto;
    }
}