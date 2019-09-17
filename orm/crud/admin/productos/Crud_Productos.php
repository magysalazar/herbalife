<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Productos extends admin_Controller {

    
    public $settings;
    
    public $optionTipoProducto;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_productos");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_options");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->optionTipoProducto = $this->model_options->get_by(array (
  'id_setting' => 6,
  0 => 'nombre',
), true);
        
        $this->optionCategoriaProducto = $this->model_options->get_by(array (
  'id_setting' => 7,
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->optionTipoProducto = $this->model_options->setForeignValues($this->optionTipoProducto,'id_setting',$this->settings,'id_setting');
        
        $this->optionCategoriaProducto = $this->model_options->setForeignValues($this->optionCategoriaProducto,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_productos->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oOptionTipoProducto'] = $this->model_options->setOptions($this->optionTipoProducto,',');
        
        $this->data['oOptionCategoriaProducto'] = $this->model_options->setOptions($this->optionCategoriaProducto,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_productos->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'descripcion',
  2 => 'id_option_tipo_producto',
  3 => 'id_option_categoria_producto',
  4 => 'precio_venta',
  5 => 'precio_porcion',
  6 => 'precio_compra',
  7 => 'num_porciones',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}