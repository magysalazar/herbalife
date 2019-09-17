<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Comandas extends admin_Controller {

    
    public $clubs;
    
    public $turnos;
    
    public $sesiones;
    
    public $usuarios;
    
    public $prepagos;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_comandas");
        
        $this->load->model("admin/model_clubs");
        
        $this->load->model("admin/model_turnos");
        
        $this->load->model("admin/model_sesiones");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_prepagos");
        
        $this->initLoaded();

        $this->clubs = $this->model_clubs->get_by(array (
  0 => 'nombre',
), true);
        
        $this->turnos = $this->model_turnos->get_by(array (
  0 => 'id_asociado',
  1 => 'descripcion',
), true);
        
        $this->sesiones = $this->model_sesiones->get_by('id_asociado', true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
            'id_club' => $this->data['idClubSess']
), true);
        
        $this->prepagos = $this->model_prepagos->get_by('id_cliente', true);
        
        
        $this->turnos = $this->model_turnos->setForeignValues($this->turnos,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->sesiones = $this->model_sesiones->setForeignValues($this->sesiones,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->prepagos = $this->model_prepagos->setForeignValues($this->prepagos,'id_cliente',$this->usuarios,'id_usuario');
        
        $this->data['table_name'] = $this->model_comandas->_table_name;
        
        $this->data['oClubs'] = $this->model_clubs->setOptions($this->clubs,',');
        
        $this->data['oTurnos'] = $this->model_turnos->setOptions($this->turnos,',');
        
        $this->data['oSesiones'] = $this->model_sesiones->setOptions($this->sesiones,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oPrepagos'] = $this->model_prepagos->setOptions($this->prepagos,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_comandas->array_from_post(
                $aFromPost = array (
  0 => 'id_club',
  1 => 'id_turno',
  2 => 'id_sesion',
  3 => 'id_cliente',
  4 => 'ids_vasos',
  5 => 'importe',
  6 => 'a_cuenta',
  7 => 'saldo',
  8 => 'prioridad',
  9 => 'hora_entrega',
  10 => 'tipo_consumo',
  11 => 'comentarios',
  12 => 'id_ficha_prepago',
  13 => 'pagado',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}