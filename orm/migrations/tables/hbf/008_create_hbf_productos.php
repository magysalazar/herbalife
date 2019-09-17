<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_productos extends CI_Migration
{
    const tableId = 'id_producto';
    const tableName = 'hbf_productos';
    const tableFields = array (
  'id_producto' => 
  array (
    'field' => 'id_producto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_producto',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_producto',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_producto',
  ),
  'id_option_tipo_producto' => 
  array (
    'field' => 'id_option_tipo_producto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipos de Productos',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 6,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_producto',
  ),
  'id_option_categoria_producto' => 
  array (
    'field' => 'id_option_categoria_producto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Categorias de Productos',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 7,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_producto',
  ),
  'foto_producto' => 
  array (
    'field' => 'foto_producto',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Imagen del producto',
    'input' => 'image',
    'validate' => 0,
    'pk' => 'id_producto',
  ),
  'precio_venta' => 
  array (
    'field' => 'precio_venta',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Precio de ventra',
    'validate' => 'required',
    'pk' => 'id_producto',
  ),
  'precio_porcion' => 
  array (
    'field' => 'precio_porcion',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Precio de una porcion',
    'validate' => 'required',
    'pk' => 'id_producto',
  ),
  'precio_compra' => 
  array (
    'field' => 'precio_compra',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Precio de Compra',
    'validate' => 'required',
    'pk' => 'id_producto',
  ),
  'num_porciones' => 
  array (
    'field' => 'num_porciones',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Porciones',
    'validate' => 'required',
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
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
    'pk' => 'id_producto',
  ),
);
    const tableForeignKeys = array (
  'hbf_productos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_productos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_productos_ibfk_3' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_option_categoria_producto',
    'idForeign' => 'id_option',
  ),
  'hbf_productos_ibfk_4' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_option_tipo_producto',
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
        //$this->dbforge->drop_table('hbf_productos');
    }
}