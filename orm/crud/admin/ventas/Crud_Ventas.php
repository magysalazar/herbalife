<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Ventas extends admin_Controller {

    
    public $clubs;
    
    public $turnos;
    
    public $sesiones;
    
    public $usuarios;
    
    public $productos;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_ventas");
        
        $this->load->model("admin/model_clubs");
        
        $this->load->model("admin/model_turnos");
        
        $this->load->model("admin/model_sesiones");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_productos");
        
        $this->initLoaded();
        
        $this->clubs = $this->model_clubs->get_by(array (
  0 => 'nombre',
), true);
        
        $this->turnos = $this->model_turnos->get_by(array (
  0 => 'id_asociado',
), true);
        
        $this->sesiones = $this->model_sesiones->get_by(array (
  0 => 'id_asociado',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        $this->productos = $this->model_productos->get_by(array (
  0 => 'nombre',
  1 => 'foto_producto',
), true);
        
        
        $this->turnos = $this->model_turnos->setForeignValues($this->turnos,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->sesiones = $this->model_sesiones->setForeignValues($this->sesiones,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->data['table_name'] = $this->model_ventas->_table_name;
        
        $this->data['oClubs'] = $this->model_clubs->setOptions($this->clubs,',');
        
        $this->data['oTurnos'] = $this->model_turnos->setOptions($this->turnos,',');
        
        $this->data['oSesiones'] = $this->model_sesiones->setOptions($this->sesiones,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oProductos'] = $this->model_productos->setOptions($this->productos,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_ventas->array_from_post(
                $aFromPost = array (
  0 => 'id_club',
  1 => 'id_turno',
  2 => 'id_sesion',
  3 => 'id_cliente',
  4 => 'fecha_venta',
  5 => 'id_producto',
  6 => 'precio',
  7 => 'observaciones',
  8 => 'a_cuenta',
  9 => 'saldo',
  10 => 'entregado',
  11 => 'pagado',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}