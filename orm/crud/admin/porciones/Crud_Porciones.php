<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Porciones extends admin_Controller {

    
    public $productos;
    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_porciones");
        
        $this->load->model("admin/model_productos");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->productos = $this->model_productos->get_by(array (
  0 => 'nombre',
  1 => 'foto_producto',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->data['table_name'] = $this->model_porciones->_table_name;
        
        $this->data['oProductos'] = $this->model_productos->setOptions($this->productos,'|');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_porciones->array_from_post(
                $aFromPost = array (
  0 => 'id_producto',
  1 => 'cantidad',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}