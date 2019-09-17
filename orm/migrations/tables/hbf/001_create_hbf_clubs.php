<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_clubs extends CI_Migration
{
    const tableId = 'id_club';
    const tableName = 'hbf_clubs';
    const tableFields = array (
  'id_club' => 
  array (
    'field' => 'id_club',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_club',
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
    'pk' => 'id_club',
  ),
  'email' => 
  array (
    'field' => 'email',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_club',
  ),
  'direccion' => 
  array (
    'field' => 'direccion',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_club',
  ),
  'licencia' => 
  array (
    'field' => 'licencia',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_club',
  ),
  'direccion_gps' => 
  array (
    'field' => 'direccion_gps',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'hidden',
    'pk' => 'id_club',
  ),
  'ids_miembros' => 
  array (
    'field' => 'ids_miembros',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Agregar Miembros',
    'input' => 'button',
    'subTable' => 'hbf_usuarios',
    'subview' => 'edit-ini',
    'action' => 'edit',
    'onclick' => 'oModal.open(this)',
    'content' => 'Haz click para agregar nuevos miembros',
    'validate' => 0,
    'pk' => 'id_club',
  ),
  'ids_turnos' => 
  array (
    'field' => 'ids_turnos',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Agregar Turnos',
    'input' => 'button',
    'subTable' => 'hbf_turnos',
    'action' => 'edit',
    'onclick' => 'oModal.open(this)',
    'content' => 'Haz click para agregar nuevos turnos',
    'validate' => 0,
    'pk' => 'id_club',
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
    'pk' => 'id_club',
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
    'pk' => 'id_club',
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
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'multiselect',
    'label' => 'Ususario que modifico',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_club',
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
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'multiselect',
    'label' => 'Ususario que creo',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_club',
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
    'pk' => 'id_club',
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
    'pk' => 'id_club',
  ),
);
    const tableForeignKeys = array (
  'hbf_clubs_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_clubs_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
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
        //$this->dbforge->drop_table('hbf_clubs');
    }
}