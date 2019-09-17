<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_usuarios extends CI_Migration
{
    const tableId = 'id_usuario';
    const tableName = 'ci_usuarios';
    const tableFields = array (
  'id_usuario' => 
  array (
    'field' => 'id_usuario',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'email' => 
  array (
    'field' => 'email',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 
    array (
      0 => 'email',
    ),
    'pk' => 'id_usuario',
  ),
  'password' => 
  array (
    'field' => 'password',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 
    array (
      0 => 'password',
    ),
    'input' => 'password',
    'pk' => 'id_usuario',
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Invitado por',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 0,
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_usuario',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Telefono 1',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'labe' => 'Telefono 2',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 1',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 2',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Codigo de acceso',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de asociado',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 2,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_usuario',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nivel de asociado',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 3,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_usuario',
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
    'label' => 'Club Perteneciente',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_club',
    'table' => 'hbf_clubs',
    'pk' => 'id_usuario',
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
    'input' => 'dropdown',
    'selectBy' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
    'pk' => 'id_usuario',
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
    'pk' => 'id_usuario',
  ),
  'id_opcion_role' => 
  array (
    'field' => 'id_opcion_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Role del usuario',
    'input' => 'radios',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 4,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_usuario',
  ),
  'foto_perfil' => 
  array (
    'field' => 'foto_perfil',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Foto de perfil',
    'input' => 'image',
    'validate' => 0,
    'pk' => 'id_usuario',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app monitoreo',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app ordenes',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app administrador',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
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
    'pk' => 'id_usuario',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'id_tipo_usuario' => 
  array (
    'field' => 'id_tipo_usuario',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de Usuario',
    'input' => 'radios',
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
    'pk' => 'id_usuario',
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
    'pk' => 'id_usuario',
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
    'pk' => 'id_usuario',
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
    'pk' => 'id_usuario',
  ),
);
    const tableForeignKeys = array (
  'ci_usuarios_ibfk_1' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_option_tipo_asociado',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_2' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_option_nivel_asociado',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'invitado_por',
    'idForeign' => 'id_usuario',
  ),
  'ci_usuarios_ibfk_4' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_opcion_role',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_5' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
  'ci_usuarios_ibfk_6' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_sesion',
    'idForeign' => 'id_sesion',
  ),
  'ci_usuarios_ibfk_7' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_tipo_usuario',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_8' => 
  array (
    'table' => 'hbf_clubs',
    'idLocal' => 'id_club',
    'idForeign' => 'id_club',
  ),
);
    const tableSettings = array (
  'indexFields' => 
  array (
    0 => 'nombre',
    1 => 'apellido',
    2 => 'sexo',
    3 => 'cellphone_number_1',
  ),
  'numListed' => 5,
  'id_tipo_usuario' => 
  array (
    'edit-draft' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
      2 => 'sexo',
      3 => 'id_option_tipo_usuario',
    ),
    'edit-cliente' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
      2 => 'sexo',
      3 => 'cellphone_number_1',
      4 => 'id_turno',
      5 => 'id_sesion',
      6 => 'foto_perfil',
      7 => 'id_option_tipo_usuario',
    ),
    'edit-ini' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
      2 => 'sexo',
      3 => 'cellphone_number_1',
      4 => 'id_option_tipo_usuario',
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
        //$this->dbforge->drop_table('ci_usuarios');
    }
}