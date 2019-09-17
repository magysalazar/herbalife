<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Ingresos extends admin_Controller {

    
    public $usuarios;
    
    public $comandas;
    
    public $prepagos;
    
    public $productos;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_ingresos");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_comandas");
        
        $this->load->model("admin/model_prepagos");
        
        $this->load->model("admin/model_productos");
        
        $this->initLoaded();
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        $this->comandas = $this->model_comandas->get_by(array (
  0 => 'id_cliente',
), true);
        
        $this->prepagos = $this->model_prepagos->get_by(array (
  0 => 'id_cliente',
), true);
        
        $this->productos = $this->model_productos->get_by(array (
  0 => 'nombre',
  1 => 'descripcion',
), true);
        
        
        $this->comandas = $this->model_comandas->setForeignValues($this->comandas,'id_cliente',$this->usuarios,'id_usuario');
        
        $this->prepagos = $this->model_prepagos->setForeignValues($this->prepagos,'id_cliente',$this->usuarios,'id_usuario');
        
        $this->data['table_name'] = $this->model_ingresos->_table_name;
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oComandas'] = $this->model_comandas->setOptions($this->comandas,',');
        
        $this->data['oPrepagos'] = $this->model_prepagos->setOptions($this->prepagos,',');
        
        $this->data['oProductos'] = $this->model_productos->setOptions($this->productos,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_ingresos->array_from_post(
                $aFromPost = array (
  0 => 'id_cliente',
  1 => 'id_comanda',
  2 => 'id_prepago',
  3 => 'id_producto',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}