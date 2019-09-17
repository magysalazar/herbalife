<?php 
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_Clubs extends admin_Controller {

    
    public $usuarios;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/model_clubs");
        
        $this->load->model("base/model_usuarios");
        
        $this->initLoaded();
        
        $this->usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
), true);
        
        
        $this->data['table_name'] = $this->model_clubs->_table_name;
        
        $this->data['oUsuarios'] = $this->model_usuarios->setOptions($this->usuarios,',');
        
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_clubs->array_from_post(
                $aFromPost = array (
  0 => 'nombre',
  1 => 'email',
  2 => 'direccion',
  3 => 'licencia',
  4 => 'ids_miembros',
  5 => 'ids_turnos',
)
            );
        }
        
        return [$data,$aFromPost];
    }
    
}