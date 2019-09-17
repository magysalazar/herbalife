<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Sesiones extends admin_Controller {

    
    public $settings;
    
    public $clubs;
    
    public $turnos;
    
    public $usuarios;
    
    public $opcionSesion;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_sesiones");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("admin/model_clubs");
        
        $this->load->model("admin/model_turnos");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("base/model_options");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->clubs = $this->model_clubs->get_by(array (
  0 => 'nombre',
), true);
        
        $this->turnos = $this->model_turnos->get_by('id_asociado', true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
            'id_club' => $this->data['idClubSess']
), true);
        
        $this->opcionSesion = $this->model_options->get_by(array (
  'id_setting' => 9,
  0 => 'nombre',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->turnos = $this->model_turnos->setForeignValues($this->turnos,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->opcionSesion = $this->model_options->setForeignValues($this->opcionSesion,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_sesiones->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oClubs'] = $this->model_clubs->setOptions($this->clubs,',');
        
        $this->data['oTurnos'] = $this->model_turnos->setOptions($this->turnos,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oOpcionSesion'] = $this->model_options->setOptions($this->opcionSesion,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_sesiones->array_from_post(
                $aFromPost = array (
  0 => 'id_club',
  1 => 'id_turno',
  2 => 'id_asociado',
  3 => 'detalle',
  4 => 'caja_inicial',
  5 => 'caja_final',
  6 => 'total',
  7 => 'num_consumos',
  8 => 'total_ingresos',
  9 => 'total_egresos',
  10 => 'total_deben',
  11 => 'total_sobra',
  12 => 'total_falta',
  13 => 'sobre_rojo',
  14 => 'sobre_verde',
  15 => 'deposito',
  16 => 'cerrado',
  17 => 'observaciones',
  18 => 'fec_sesion',
  19 => 'id_opcion_sesion',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}