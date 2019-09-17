<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_turnos extends CI_Migration
{
    const tableId = 'id_turno';
    const tableName = 'hbf_turnos';
    const tableFields = array (
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_turno',
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
    'label' => 'Nombre del Club',
    'input' => 'dropdown',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_club',
    'table' => 'hbf_clubs',
    'pk' => 'id_turno',
  ),
  'id_asociado' => 
  array (
    'field' => 'id_asociado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Asociado a cargo',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
  ),
  'fec_inicio' => 
  array (
    'field' => 'fec_inicio',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de Inicio',
    'validate' => 0,
    'pk' => 'id_turno',
  ),
  'fec_fin' => 
  array (
    'field' => 'fec_fin',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de Cierre',
    'validate' => 0,
    'pk' => 'id_turno',
  ),
  'horario_desde' => 
  array (
    'field' => 'horario_desde',
    'type' => 'time',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'hora de inicio',
    'validate' => 0,
    'pk' => 'id_turno',
  ),
  'horario_hasta' => 
  array (
    'field' => 'horario_hasta',
    'type' => 'time',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Hora de Cierre',
    'validate' => 0,
    'pk' => 'id_turno',
  ),
  'total_consumos' => 
  array (
    'field' => 'total_consumos',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Total de consumos',
    'validate' => 0,
    'pk' => 'id_turno',
  ),
  'id_opcion_turnos' => 
  array (
    'field' => 'id_opcion_turnos',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Turno con',
    'input' => 'select',
    'selectBy' => 
    array (
      0 => 'id_setting',
    ),
    'filterBy' => 
    array (
      'id_setting' => 10,
      0 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'ci_options',
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
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
    'pk' => 'id_turno',
  ),
);
    const tableForeignKeys = array (
  'hbf_turnos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_turnos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_turnos_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_asociado',
    'idForeign' => 'id_usuario',
  ),
  'hbf_turnos_ibfk_4' => 
  array (
    'table' => 'hbf_clubs',
    'idLocal' => 'id_club',
    'idForeign' => 'id_club',
  ),
  'hbf_turnos_ibfk_5' => 
  array (
    'table' => 'ci_options',
    'idLocal' => 'id_opcion_turnos',
    'idForeign' => 'id_option',
  ),
);
    const tableSettings = array (
  'id_opcion_turnos' => 
  array (
    'edit-ini' => 
    array (
      0 => 'fec_inicio',
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
        //$this->dbforge->drop_table('hbf_turnos');
    }
}