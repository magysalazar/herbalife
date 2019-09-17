<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Vasos extends admin_Controller {

    
    public $settings;
    
    public $comandas;
    
    public $opcionTipoProducto;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_vasos");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("admin/model_comandas");
        
        $this->load->model("base/model_options");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->comandas = $this->model_comandas->get_by(array (
  0 => 'id_cliente',
), true);
        
        $this->opcionTipoProducto = $this->model_options->get_by(array (
  'id_setting' => 6,
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->comandas = $this->model_comandas->setForeignValues($this->comandas,'id_cliente',$this->usuarios,'id_usuario');
        
        $this->opcionTipoProducto = $this->model_options->setForeignValues($this->opcionTipoProducto,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_vasos->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oComandas'] = $this->model_comandas->setOptions($this->comandas,',');
        
        $this->data['oOpcionTipoProducto'] = $this->model_options->setOptions($this->opcionTipoProducto,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_vasos->array_from_post(
                $aFromPost = array (
  0 => 'id_comanda',
  1 => 'nivel',
  2 => 'temperatura',
  3 => 'consistencia',
  4 => 'id_opcion_tipo_producto',
  5 => 'num_productos',
  6 => 'detalle',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}