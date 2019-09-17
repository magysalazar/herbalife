<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_sessions extends CI_Migration
{
    const tableId = 'id';
    const tableName = 'ci_sessions';
    const tableFields = array (
  'id' => 
  array (
    'field' => 'id',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'data' => 
  array (
    'field' => 'data',
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Datos en sesion',
    'input' => 'textarea',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'id_usuario' => 
  array (
    'field' => 'id_usuario',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del Usuario',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion de',
    'selectBy' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_sesion',
    'table' => 'hbf_sesiones',
    'pk' => 'id',
  ),
);
    const tableForeignKeys = array (
  'ci_sessions_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_usuario',
    'idForeign' => 'id_usuario',
  ),
  'ci_sessions_ibfk_2' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_hbf_sesion',
    'idForeign' => 'id_sesion',
  ),
);
    const tableSettings = array (
  'title' => 'Sesiones del Sistema',
  'indexFields' => 
  array (
    0 => 'ip_address',
    1 => 'timestamp',
    2 => 'last_activity',
    3 => 'id_usuario',
  ),
  'numListed' => 4,
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
        //$this->dbforge->drop_table('ci_sessions');
    }
}