<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Settings extends base_Controller {

    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->data['table_name'] = $this->model_settings->_table_name;
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_settings->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'tabla',
  2 => 'id_field',
  3 => 'fields',
  4 => 'edit_tag',
  5 => 'descripcion',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}