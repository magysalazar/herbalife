<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Turnos extends admin_Controller {

    
    public $settings;
    
    public $clubs;
    
    public $usuarios;
    
    public $opcionTurnos;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_turnos");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("admin/model_clubs");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("base/model_options");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->clubs = $this->model_clubs->get_by(array (
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
            'id_club' => $this->oUserLogguedIn->getIdClub()
), true);
        
        $this->opcionTurnos = $this->model_options->get_by(array (
  'id_setting' => 10,
  0 => 'nombre',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->opcionTurnos = $this->model_options->setForeignValues($this->opcionTurnos,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_turnos->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oClubs'] = $this->model_clubs->setOptions($this->clubs,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oOpcionTurnos'] = $this->model_options->setOptions($this->opcionTurnos,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_turnos->array_from_post(
                $aFromPost = array (
  0 => 'id_club',
  1 => 'id_asociado',
  2 => 'descripcion',
  3 => 'fec_inicio',
  4 => 'fec_fin',
  5 => 'horario_desde',
  6 => 'horario_hasta',
  7 => 'total_consumos',
  8 => 'id_opcion_turnos',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}