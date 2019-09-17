<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:04 am
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Modulos extends base_Controller {

    
    public $settings;
    
    public $opcionModulo;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("base/model_modulos");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_options");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->opcionModulo = $this->model_options->get_by(array (
  'id_setting' => 1,
  0 => 'nombre',
), true);
        
        $this->opcionRoles = $this->model_options->get_by(array (
  'id_setting' => 4,
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->opcionModulo = $this->model_options->setForeignValues($this->opcionModulo,'id_setting',$this->settings,'id_setting');
        
        $this->opcionRoles = $this->model_options->setForeignValues($this->opcionRoles,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_modulos->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oOpcionModulo'] = $this->model_options->setOptions($this->opcionModulo,',');
        
        $this->data['oOpcionRoles'] = $this->model_options->setOptions($this->opcionRoles,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_modulos->array_from_post(
                $aFromPost = array (
  0 => 'id_opcion_modulo',
  1 => 'id_opcion_roles',
  2 => 'titulo',
  3 => 'tabla',
  4 => 'listed',
  5 => 'descripcion',
  6 => 'icon',
  7 => 'url',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}