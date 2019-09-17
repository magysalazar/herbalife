<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_vasos extends CI_Migration
{
    const tableId = 'id_vaso';
    const tableName = 'hbf_vasos';
    const tableFields = array (
  'id_vaso' => 
  array (
    'field' => 'id_vaso',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_vaso',
  ),
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Comanda del Cliente',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_cliente',
    ),
    'validate' => 'required',
    'idForeign' => 'id_comanda',
    'table' => 'hbf_comandas',
    'pk' => 'id_vaso',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nivel del vaso (0% - 100%)',
    'validate' => 'required',
    'pk' => 'id_vaso',
  ),
  'temperatura' => 
  array (
    'field' => 'temperatura',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Temperatura',
    'options' => 
    array (
      0 => 'Frio',
      1 => 'Tibio',
      2 => 'Caliente',
    ),
    'input' => 'radios',
    'validate' => 'required',
    'pk' => 'id_vaso',
  ),
  'consistencia' => 
  array (
    'field' => 'consistencia',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Consistencia',
    'options' => 
    array (
      0 => 'Cremoso',
      1 => 'Al jugo',
    ),
    'input' => 'radios',
    'validate' => 'required',
    'pk' => 'id_vaso',
  ),
  'id_opcion_tipo_producto' => 
  array (
    'field' => 'id_opcion_tipo_producto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipos de Productos',
    'input' => 'radios',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 6,
      0 => 'nombre',
    ),
    'subTable' => 'hbf_detalles_pedidos',
    'action' => 'edit',
    'onclick' => 'oModal.open(this)',
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_vaso',
  ),
  'num_productos' => 
  array (
    'field' => 'num_productos',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Productos',
    'validate' => 0,
    'data' => 
    array (
      'step' => 1,
    ),
    'pk' => 'id_vaso',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_vaso',
  ),
  'estado' => 
  array (
    'field' => 'estado',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'label' => 'Estado',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
    'pk' => 'id_vaso',
  ),
  'change_count' => 
  array (
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_vaso',
  ),
  'id_user_modified' => 
  array (
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'label' => 'Nombre del usuario que modifico el registro',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'disabled',
    'pk' => 'id_vaso',
  ),
  'id_user_created' => 
  array (
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'label' => 'Nombre del usuario que creo el registro',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'disabled',
    'pk' => 'id_vaso',
  ),
  'date_modified' => 
  array (
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_vaso',
  ),
  'date_created' => 
  array (
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_vaso',
  ),
);
    const tableForeignKeys = array (
  'hbf_vasos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_vasos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_vasos_ibfk_3' => 
  array (
    'table' => 'hbf_comandas',
    'idLocal' => 'id_comanda',
    'idForeign' => 'id_comanda',
  ),
  'hbf_vasos_ibfk_4' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_opcion_tipo_producto',
    'idForeign' => 'id_option',
  ),
);
    const tableSettings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);

    public function up()
    {
        $this->dbforge->add_field(self::tableFields);
        $this->dbforge->add_key(self::tableId, TRUE);
        $this->dbforge->add_key(self::tableForeignKeys);
        $this->create_or_alter_table(self::tableName);
        $settings = self::tableSettings;
        $this->set_settings($settings,self::tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('hbf_vasos');
    }
}