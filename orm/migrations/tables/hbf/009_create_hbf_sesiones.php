<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_sesiones extends CI_Migration
{
    const tableId = 'id_sesion';
    const tableName = 'hbf_sesiones';
    const tableFields = array (
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'id_club' => 
  array (
    'field' => 'id_club',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del club',
    'input' => 'select',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_club',
    'table' => 'hbf_clubs',
    'pk' => 'id_sesion',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Turno de',
    'input' => 'default',
    'selectBy' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
    'pk' => 'id_sesion',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion a cargo de',
    'input' => 'default',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_sesion',
  ),
  'detalle' => 
  array (
    'field' => 'detalle',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'caja_inicial' => 
  array (
    'field' => 'caja_inicial',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Monto inicial en caja',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'caja_final' => 
  array (
    'field' => 'caja_final',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Monto final en caja',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total' => 
  array (
    'field' => 'total',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Monto total en caja',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'num_consumos' => 
  array (
    'field' => 'num_consumos',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Cantidad de consumos del dia',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total_ingresos' => 
  array (
    'field' => 'total_ingresos',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Total ingresos',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total_egresos' => 
  array (
    'field' => 'total_egresos',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Total egresos',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total_deben' => 
  array (
    'field' => 'total_deben',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Total deudas de clientes',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total_sobra' => 
  array (
    'field' => 'total_sobra',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Total dinero sobrante',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'total_falta' => 
  array (
    'field' => 'total_falta',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Total dinero faltante',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'sobre_rojo' => 
  array (
    'field' => 'sobre_rojo',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Dinero al sobre rojo',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'sobre_verde' => 
  array (
    'field' => 'sobre_verde',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Dinero al sobre verde',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'deposito' => 
  array (
    'field' => 'deposito',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Dinero depositado',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'cerrado' => 
  array (
    'field' => 'cerrado',
    'type' => 'varchar',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Estado de la sesion',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'cerrado',
      1 => 'abierto',
    ),
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'fec_sesion' => 
  array (
    'field' => 'fec_sesion',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_sesion',
  ),
  'id_opcion_sesion' => 
  array (
    'field' => 'id_opcion_sesion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion con',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 9,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
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
    'pk' => 'id_sesion',
  ),
);
    const tableForeignKeys = array (
  'hbf_sesiones_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_sesiones_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_sesiones_ibfk_3' => 
  array (
    'table' => 'hbf_clubs',
    'idLocal' => 'id_club',
    'idForeign' => 'id_club',
  ),
  'hbf_sesiones_ibfk_4' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_asociado',
    'idForeign' => 'id_usuario',
  ),
  'hbf_sesiones_ibfk_5' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
  'hbf_sesiones_ibfk_6' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_opcion_sesion',
    'idForeign' => 'id_option',
  ),
);
    const tableSettings = array (
  'id_opcion_sesion' => 
  array (
    'edit-ini' => 
    array (
      0 => 'fec_sesion',
      1 => 'caja_inicial',
    ),
  ),
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
        //$this->dbforge->drop_table('hbf_sesiones');
    }
}