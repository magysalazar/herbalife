<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:57 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Options extends base_Controller {

    
    public $settings;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("base/model_options");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->data['table_name'] = $this->model_options->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
  3 => 'nivel',
  4 => 'precio',
  5 => 'num_fichas',
  6 => 'id_modulo',
  7 => 'edit_tag',
)
            );
        }
        
        else if(compareStrStr($view, 'roles')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
  3 => 'nivel',
  4 => 'edit_tag',
)
            );
        }
        
        else if(compareStrStr($view, 'prepagos')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
  3 => 'precio',
  4 => 'num_fichas',
)
            );
        }
        
        else if(compareStrStr($view, 'modulos')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
  3 => 'id_modulo',
)
            );
        }
        
        else if(compareStrStr($view, 'tipo_asociado')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
)
            );
        }
        
        else if(compareStrStr($view, 'nivel_asociado')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
)
            );
        }
        
        else if(compareStrStr($view, 'tipo_usuario')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
  3 => 'edit_tag',
)
            );
        }
        
        else if(compareStrStr($view, 'tipo_producto')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
)
            );
        }
        
        else if(compareStrStr($view, 'categoria_producto')){
            $data = $this->model_options->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_setting',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}