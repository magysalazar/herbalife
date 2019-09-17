<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_prepagos extends CI_Migration
{
    const tableId = 'id_prepago';
    const tableName = 'hbf_prepagos';
    const tableFields = array (
  'id_prepago' => 
  array (
    'field' => 'id_prepago',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'id_cliente' => 
  array (
    'field' => 'id_cliente',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Cliente',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_prepago',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Turno de',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_asociado',
    ),
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
    'pk' => 'id_prepago',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion de',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_asociado',
    ),
    'validate' => 'required',
    'idForeign' => 'id_sesion',
    'table' => 'hbf_sesiones',
    'pk' => 'id_prepago',
  ),
  'fichas_total' => 
  array (
    'field' => 'fichas_total',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'fichas_usadas' => 
  array (
    'field' => 'fichas_usadas',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'fichas_gratis' => 
  array (
    'field' => 'fichas_gratis',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'fichas_restantes' => 
  array (
    'field' => 'fichas_restantes',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'id_option_tipo_prepago' => 
  array (
    'field' => 'id_option_tipo_prepago',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de Prepago',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 5,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_prepago',
  ),
  'a_cuenta' => 
  array (
    'field' => 'a_cuenta',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'saldo' => 
  array (
    'field' => 'saldo',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'importe' => 
  array (
    'field' => 'importe',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => 'NO',
    'extra' => '',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'input' => 'radios',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'finalizado' => 
  array (
    'field' => 'finalizado',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => 'NO',
    'extra' => '',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'input' => 'radios',
    'validate' => 'required',
    'pk' => 'id_prepago',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
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
    'pk' => 'id_prepago',
  ),
);
    const tableForeignKeys = array (
  'hbf_prepagos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_cliente',
    'idForeign' => 'id_usuario',
  ),
  'hbf_prepagos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_prepagos_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_prepagos_ibfk_4' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_sesion',
    'idForeign' => 'id_sesion',
  ),
  'hbf_prepagos_ibfk_5' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_option_tipo_prepago',
    'idForeign' => 'id_option',
  ),
  'hbf_prepagos_ibfk_6' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
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
        //$this->dbforge->drop_table('hbf_prepagos');
    }
}