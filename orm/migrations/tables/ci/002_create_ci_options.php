<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_options extends CI_Migration
{
    const tableId = 'id_option';
    const tableName = 'ci_options';
    const tableFields = array (
  'id_option' => 
  array (
    'field' => 'id_option',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_option',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_option',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_option',
  ),
  'id_setting' => 
  array (
    'field' => 'id_setting',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Opcion para',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_setting',
    'table' => 'ci_settings',
    'pk' => 'id_option',
  ),
  'nivel' => 
  array (
    'field' => 'nivel',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nivel de usuario',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'Baja',
      1 => 'Media',
      2 => 'Alta',
    ),
    'validate' => 'required',
    'pk' => 'id_option',
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
    'pk' => 'id_option',
  ),
  'num_fichas' => 
  array (
    'field' => 'num_fichas',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_option',
  ),
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_option',
  ),
  'edit_tag' => 
  array (
    'field' => 'edit_tag',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_option',
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
    'pk' => 'id_option',
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
    'pk' => 'id_option',
  ),
  'id_user_modified' => 
  array (
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '10',
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
    'pk' => 'id_option',
  ),
  'id_user_created' => 
  array (
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '10',
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
    'pk' => 'id_option',
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
    'pk' => 'id_option',
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
    'pk' => 'id_option',
  ),
);
    const tableForeignKeys = array (
  'ci_options_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'ci_options_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'ci_options_ibfk_3' => 
  array (
    'table' => 'ci_settings',
    'idLocal' => 'id_setting',
    'idForeign' => 'id_setting',
  ),
);
    const tableSettings = array (
  'title' => 'Opciones del Sistema',
  'listedFields' => 
  array (
    0 => 'nombre',
    1 => 'descripcion',
    2 => 'id_setting',
  ),
  'id_setting' => 
  array (
    'edit-roles' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'nivel',
      4 => 'tipo',
      5 => 'edit_tag',
    ),
    'edit-prepagos' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'precio',
      4 => 'num_fichas',
      5 => 'tipo',
    ),
    'edit-modulos' => 
    array (
      0 => 'id_setting',
      1 => 'id_modulo',
      2 => 'nombre',
      3 => 'descripcion',
      4 => 'tipo',
    ),
    'edit-tipo_asociado' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'tipo',
    ),
    'edit-nivel_asociado' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'tipo',
    ),
    'edit-tipo_usuario' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'tipo',
      4 => 'edit_tag',
    ),
    'edit-tipo_producto' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'tipo',
    ),
    'edit-categoria_producto' => 
    array (
      0 => 'id_setting',
      1 => 'nombre',
      2 => 'descripcion',
      3 => 'tipo',
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
        //$this->dbforge->drop_table('ci_options');
    }
}