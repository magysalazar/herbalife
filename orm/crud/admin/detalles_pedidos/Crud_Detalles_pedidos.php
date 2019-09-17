<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Detalles_pedidos extends admin_Controller {

    
    public $comandas;
    
    public $vasos;
    
    public $productos;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_detalles_pedidos");
        
        $this->load->model("admin/model_comandas");
        
        $this->load->model("admin/model_vasos");
        
        $this->load->model("admin/model_productos");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->comandas = $this->model_comandas->get_by(array (
  0 => 'id_cliente',
), true);
        
        $this->vasos = $this->model_vasos->get_by(array (
  0 => 'id_comanda',
), true);
        
        $this->productos = $this->model_productos->get_by(array (
  0 => 'nombre',
  1 => 'foto_producto',
  2 => 
  array (
    0 => 'id_option_tipo_producto',
  ),
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->comandas = $this->model_comandas->setForeignValues($this->comandas,'id_cliente',$this->usuarios,'id_usuario');
        
        $this->vasos = $this->model_vasos->setForeignValues($this->vasos,'id_comanda',$this->comandas,'id_comanda');
        
        $this->data['table_name'] = $this->model_detalles_pedidos->_table_name;
        
        $this->data['oComandas'] = $this->model_comandas->setOptions($this->comandas,',');
        
        $this->data['oVasos'] = $this->model_vasos->setOptions($this->vasos,',');
        
        $this->data['oProductos'] = $this->model_productos->setOptions($this->productos,'|');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_detalles_pedidos->array_from_post(
                $aFromPost = array (
  0 => 'id_comanda',
  1 => 'id_vaso',
  2 => 'id_producto',
  3 => 'cantidad',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}