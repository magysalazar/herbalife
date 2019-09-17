<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Prepagos extends admin_Controller {

    
    public $settings;
    
    public $usuarios;
    
    public $turnos;
    
    public $sesiones;
    
    public $optionTipoPrepago;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_prepagos");
        
        $this->load->model("base/model_settings");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_turnos");
        
        $this->load->model("admin/model_sesiones");
        
        $this->load->model("base/model_options");
        
        $this->initLoaded();
        
        $this->settings = $this->model_settings->get_by(array (
  0 => 'nombre',
), true);
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        $this->turnos = $this->model_turnos->get_by(array (
  0 => 'id_asociado',
), true);
        
        $this->sesiones = $this->model_sesiones->get_by(array (
  0 => 'id_asociado',
), true);
        
        $this->optionTipoPrepago = $this->model_options->get_by(array (
  'id_setting' => 5,
  0 => 'nombre',
), true);
        
        
        $this->settings = $this->model_settings->setForeignValues($this->settings,'id_setting',$this->settings,'id_setting');
        
        $this->turnos = $this->model_turnos->setForeignValues($this->turnos,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->sesiones = $this->model_sesiones->setForeignValues($this->sesiones,'id_asociado',$this->usuarios,'id_usuario');
        
        $this->optionTipoPrepago = $this->model_options->setForeignValues($this->optionTipoPrepago,'id_setting',$this->settings,'id_setting');
        
        $this->data['table_name'] = $this->model_prepagos->_table_name;
        
        $this->data['oSettings'] = $this->model_settings->setOptions($this->settings,',');
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
        $this->data['oTurnos'] = $this->model_turnos->setOptions($this->turnos,',');
        
        $this->data['oSesiones'] = $this->model_sesiones->setOptions($this->sesiones,',');
        
        $this->data['oOptionTipoPrepago'] = $this->model_options->setOptions($this->optionTipoPrepago,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_prepagos->array_from_post(
                $aFromPost = array (
  0 => 'id_cliente',
  1 => 'id_turno',
  2 => 'id_sesion',
  3 => 'fichas_total',
  4 => 'fichas_usadas',
  5 => 'fichas_gratis',
  6 => 'fichas_restantes',
  7 => 'id_option_tipo_prepago',
  8 => 'a_cuenta',
  9 => 'saldo',
  10 => 'importe',
  11 => 'pagado',
  12 => 'finalizado',
  13 => 'observaciones',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}