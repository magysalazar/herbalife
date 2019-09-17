<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Trait_Sesiones extends admin_Model {

    public $sesion;

    
             /**
                * The value for the id_sesion field.
                *
                * @var        int
                */             
             public $id_sesion;
        
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
                * The value for the id_asociado field.
                *
                * @var        int
                */             
             public $id_asociado;
        
             /**
                * The value for the detalle field.
                *
                * @var        string
                */             
             public $detalle;
        
             /**
                * The value for the caja_inicial field.
                *
                * @var        
                */             
             public $caja_inicial;
        
             /**
                * The value for the caja_final field.
                *
                * @var        
                */             
             public $caja_final;
        
             /**
                * The value for the total field.
                *
                * @var        
                */             
             public $total;
        
             /**
                * The value for the num_consumos field.
                *
                * @var        
                */             
             public $num_consumos;
        
             /**
                * The value for the total_ingresos field.
                *
                * @var        
                */             
             public $total_ingresos;
        
             /**
                * The value for the total_egresos field.
                *
                * @var        
                */             
             public $total_egresos;
        
             /**
                * The value for the total_deben field.
                *
                * @var        
                */             
             public $total_deben;
        
             /**
                * The value for the total_sobra field.
                *
                * @var        
                */             
             public $total_sobra;
        
             /**
                * The value for the total_falta field.
                *
                * @var        
                */             
             public $total_falta;
        
             /**
                * The value for the sobre_rojo field.
                *
                * @var        
                */             
             public $sobre_rojo;
        
             /**
                * The value for the sobre_verde field.
                *
                * @var        
                */             
             public $sobre_verde;
        
             /**
                * The value for the deposito field.
                *
                * @var        
                */             
             public $deposito;
        
             /**
                * The value for the cerrado field.
                *
                * @var        string
                */             
             public $cerrado;
        
             /**
                * The value for the observaciones field.
                *
                * @var        string
                */             
             public $observaciones;
        
             /**
                * The value for the fec_sesion field.
                *
                * @var        string
                */             
             public $fec_sesion;
        
             /**
                * The value for the id_opcion_sesion field.
                *
                * @var        int
                */             
             public $id_opcion_sesion;
        
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
    'label' => 'Nombre del club',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Sesion a cargo de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[400]|required',
  ),
  'caja_inicial' => 
  array (
    'field' => 'caja_inicial',
    'label' => 'Monto inicial en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'caja_final' => 
  array (
    'field' => 'caja_final',
    'label' => 'Monto final en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total' => 
  array (
    'field' => 'total',
    'label' => 'Monto total en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_consumos' => 
  array (
    'field' => 'num_consumos',
    'label' => 'Cantidad de consumos del dia',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_ingresos' => 
  array (
    'field' => 'total_ingresos',
    'label' => 'Total ingresos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_egresos' => 
  array (
    'field' => 'total_egresos',
    'label' => 'Total egresos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_deben' => 
  array (
    'field' => 'total_deben',
    'label' => 'Total deudas de clientes',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_sobra' => 
  array (
    'field' => 'total_sobra',
    'label' => 'Total dinero sobrante',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_falta' => 
  array (
    'field' => 'total_falta',
    'label' => 'Total dinero faltante',
    'rules' => 'trim|max_length[10]|required',
  ),
  'sobre_rojo' => 
  array (
    'field' => 'sobre_rojo',
    'label' => 'Dinero al sobre rojo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'sobre_verde' => 
  array (
    'field' => 'sobre_verde',
    'label' => 'Dinero al sobre verde',
    'rules' => 'trim|max_length[10]|required',
  ),
  'deposito' => 
  array (
    'field' => 'deposito',
    'label' => 'Dinero depositado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'cerrado' => 
  array (
    'field' => 'cerrado',
    'label' => 'Estado de la sesion',
    'rules' => 'trim|max_length[10]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[400]|required',
  ),
  'fec_sesion' => 
  array (
    'field' => 'fec_sesion',
    'label' => 'Fec_sesion',
    'rules' => 'trim|required',
  ),
  'id_opcion_sesion' => 
  array (
    'field' => 'id_opcion_sesion',
    'label' => 'Sesion con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Nombre del club',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Sesion a cargo de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'label' => 'Detalle',
    'rules' => 'trim|max_length[400]|required',
  ),
  'caja_inicial' => 
  array (
    'field' => 'caja_inicial',
    'label' => 'Monto inicial en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'caja_final' => 
  array (
    'field' => 'caja_final',
    'label' => 'Monto final en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total' => 
  array (
    'field' => 'total',
    'label' => 'Monto total en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'num_consumos' => 
  array (
    'field' => 'num_consumos',
    'label' => 'Cantidad de consumos del dia',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_ingresos' => 
  array (
    'field' => 'total_ingresos',
    'label' => 'Total ingresos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_egresos' => 
  array (
    'field' => 'total_egresos',
    'label' => 'Total egresos',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_deben' => 
  array (
    'field' => 'total_deben',
    'label' => 'Total deudas de clientes',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_sobra' => 
  array (
    'field' => 'total_sobra',
    'label' => 'Total dinero sobrante',
    'rules' => 'trim|max_length[10]|required',
  ),
  'total_falta' => 
  array (
    'field' => 'total_falta',
    'label' => 'Total dinero faltante',
    'rules' => 'trim|max_length[10]|required',
  ),
  'sobre_rojo' => 
  array (
    'field' => 'sobre_rojo',
    'label' => 'Dinero al sobre rojo',
    'rules' => 'trim|max_length[10]|required',
  ),
  'sobre_verde' => 
  array (
    'field' => 'sobre_verde',
    'label' => 'Dinero al sobre verde',
    'rules' => 'trim|max_length[10]|required',
  ),
  'deposito' => 
  array (
    'field' => 'deposito',
    'label' => 'Dinero depositado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'cerrado' => 
  array (
    'field' => 'cerrado',
    'label' => 'Estado de la sesion',
    'rules' => 'trim|max_length[10]|required',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'label' => 'Observaciones',
    'rules' => 'trim|max_length[400]|required',
  ),
  'fec_sesion' => 
  array (
    'field' => 'fec_sesion',
    'label' => 'Fec_sesion',
    'rules' => 'trim|required',
  ),
  'id_opcion_sesion' => 
  array (
    'field' => 'id_opcion_sesion',
    'label' => 'Sesion con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    
    public $rules_edit_ini = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'label' => 'Nombre del club',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'label' => 'Sesion a cargo de',
    'rules' => 'trim|max_length[11]|required',
  ),
  'caja_inicial' => 
  array (
    'field' => 'caja_inicial',
    'label' => 'Monto inicial en caja',
    'rules' => 'trim|max_length[10]|required',
  ),
  'fec_sesion' => 
  array (
    'field' => 'fec_sesion',
    'label' => 'Fec_sesion',
    'rules' => 'trim|required',
  ),
  'id_opcion_sesion' => 
  array (
    'field' => 'id_opcion_sesion',
    'label' => 'Sesion con',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->sesion = new stdClass();

        $this->sesion->id_sesion = '';
            $this->sesion->id_club = '';
            $this->sesion->id_turno = '';
            $this->sesion->id_asociado = '';
            $this->sesion->detalle = '';
            $this->sesion->caja_inicial = '';
            $this->sesion->caja_final = '';
            $this->sesion->total = '';
            $this->sesion->num_consumos = '';
            $this->sesion->total_ingresos = '';
            $this->sesion->total_egresos = '';
            $this->sesion->total_deben = '';
            $this->sesion->total_sobra = '';
            $this->sesion->total_falta = '';
            $this->sesion->sobre_rojo = '';
            $this->sesion->sobre_verde = '';
            $this->sesion->deposito = '';
            $this->sesion->cerrado = '';
            $this->sesion->observaciones = '';
            $this->sesion->fec_sesion = '';
            $this->sesion->id_opcion_sesion = '';
            $this->sesion->estado = '';
            $this->sesion->change_count = '';
            $this->sesion->id_user_modified = '';
            $this->sesion->id_user_created = '';
            $this->sesion->date_modified = '';
            $this->sesion->date_created = '';
            

        return $this->sesion;
    }
}