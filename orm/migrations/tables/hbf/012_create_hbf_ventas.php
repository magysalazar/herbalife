<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_ventas extends CI_Migration
{
    const tableId = 'id_venta';
    const tableName = 'hbf_ventas';
    const tableFields = array (
  'id_venta' => 
  array (
    'field' => 'id_venta',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_venta',
  ),
  'id_club' => 
  array (
    'field' => 'id_club',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Club',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_club',
    'table' => 'hbf_clubs',
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_venta',
  ),
  'fecha_venta' => 
  array (
    'field' => 'fecha_venta',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_venta',
  ),
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Producto',
    'input' => 'multiselect',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'foto_producto',
    ),
    'validate' => 'required',
    'idForeign' => 'id_producto',
    'table' => 'hbf_productos',
    'pk' => 'id_venta',
  ),
  'precio' => 
  array (
    'field' => 'precio',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_venta',
  ),
  'observaciones' => 
  array (
    'field' => 'observaciones',
    'type' => 'varchar',
    'constraint' => '600',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
  ),
  'entregado' => 
  array (
    'field' => 'entregado',
    'type' => 'varchar',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fue Entregado?',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'si',
      1 => 'no',
    ),
    'validate' => 'required',
    'pk' => 'id_venta',
  ),
  'pagado' => 
  array (
    'field' => 'pagado',
    'type' => 'varchar',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fue Pagado?',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'si',
      1 => 'no',
    ),
    'validate' => 'required',
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
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
    'pk' => 'id_venta',
  ),
  'date_modified' => 
  array (
    'field' => 'date_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_venta',
  ),
  'date_created' => 
  array (
    'field' => 'date_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_venta',
  ),
);
    const tableForeignKeys = array (
  'hbf_ventas_id_venta_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_venta',
    'idForeign' => NULL,
  ),
  'hbf_ventas_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_ventas_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_ventas_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_cliente',
    'idForeign' => 'id_usuario',
  ),
  'hbf_ventas_ibfk_4' => 
  array (
    'table' => 'hbf_clubs',
    'idLocal' => 'id_club',
    'idForeign' => 'id_club',
  ),
  'hbf_ventas_ibfk_5' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
  'hbf_ventas_ibfk_6' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_sesion',
    'idForeign' => 'id_sesion',
  ),
  'hbf_ventas_ibfk_7' => 
  array (
    'table' => 'hbf_productos',
    'idLocal' => 'id_producto',
    'idForeign' => 'id_producto',
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
        //$this->dbforge->drop_table('hbf_ventas');
    }
}