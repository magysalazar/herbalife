<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_detalles_pedidos extends CI_Migration
{
    const tableId = 'id_detalle_pedido';
    const tableName = 'hbf_detalles_pedidos';
    const tableFields = array (
  'id_detalle_pedido' => 
  array (
    'field' => 'id_detalle_pedido',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_detalle_pedido',
  ),
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'type' => 'int',
    'constraint' => '11',
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
    'pk' => 'id_detalle_pedido',
  ),
  'id_vaso' => 
  array (
    'field' => 'id_vaso',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Vaso del Cliente',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_comanda',
    ),
    'validate' => 'required',
    'idForeign' => 'id_vaso',
    'table' => 'hbf_vasos',
    'pk' => 'id_detalle_pedido',
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
    'input' => 'checkbox',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'foto_producto',
      2 => 
      array (
        0 => 'id_option_tipo_producto',
      ),
    ),
    'divider' => '|',
    'insertEachOne' => true,
    'validate' => 'required',
    'idForeign' => 'id_producto',
    'table' => 'hbf_productos',
    'pk' => 'id_detalle_pedido',
  ),
  'cantidad' => 
  array (
    'field' => 'cantidad',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
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
    'pk' => 'id_detalle_pedido',
  ),
);
    const tableForeignKeys = array (
  'hbf_detalles_pedidos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_detalles_pedidos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_detalles_pedidos_ibfk_4' => 
  array (
    'table' => 'hbf_productos',
    'idLocal' => 'id_producto',
    'idForeign' => 'id_producto',
  ),
  'hbf_detalles_pedidos_ibfk_5' => 
  array (
    'table' => 'hbf_vasos',
    'idLocal' => 'id_vaso',
    'idForeign' => 'id_vaso',
  ),
  'hbf_detalles_pedidos_ibfk_6' => 
  array (
    'table' => 'hbf_comandas',
    'idLocal' => 'id_comanda',
    'idForeign' => 'id_comanda',
  ),
);
    const tableSettings = array (
  'title' => 'Detalles de Pedidos',
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
        //$this->dbforge->drop_table('hbf_detalles_pedidos');
    }
}