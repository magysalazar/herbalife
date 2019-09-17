<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 20/07/2018
 * Time: 2:03 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_hbf_comandas extends CI_Migration
{
    const tableId = 'id_comanda';
    const tableName = 'hbf_comandas';
    const tableFields = array (
  'id_comanda' => 
  array (
    'field' => 'id_comanda',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_comanda',
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
    'input' => 'select',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_club',
    'table' => 'hbf_clubs',
    'pk' => 'id_comanda',
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
      1 => 'descripcion',
    ),
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
    'pk' => 'id_comanda',
  ),
  'id_sesion' => 
  array (
    'field' => 'id_sesion',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion de',
    'input' => 'select',
    'selectBy' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_sesion',
    'table' => 'hbf_sesiones',
    'pk' => 'id_comanda',
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
    'label' => 'Nombre del Cliente',
    'input' => 'default',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'button' => 
    array (
      'content' => 'Nuevo Cliente',
      'action' => 'edit',
      'subTable' => 'ci_usuarios',
      'subView' => 'draft',
      'onclick' => 'oModal.open(this)',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_comanda',
  ),
  'ids_vasos' => 
  array (
    'field' => 'ids_vasos',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Agregar Vasos',
    'input' => 'button',
    'subTable' => 'hbf_vasos',
    'action' => 'edit',
    'onclick' => 'oCrud.save(this,oModal.open)',
    'content' => 'Haz click para agregar vasos',
    'validate' => 0,
    'pk' => 'id_comanda',
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
    'validate' => 0,
    'pk' => 'id_comanda',
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
    'validate' => 0,
    'pk' => 'id_comanda',
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
    'validate' => 0,
    'pk' => 'id_comanda',
  ),
  'prioridad' => 
  array (
    'field' => 'prioridad',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Prioridad',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'programada',
      1 => 'normal',
      2 => 'rapida',
    ),
    'validate' => 0,
    'pk' => 'id_comanda',
  ),
  'hora_entrega' => 
  array (
    'field' => 'hora_entrega',
    'type' => 'time',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_comanda',
  ),
  'tipo_consumo' => 
  array (
    'field' => 'tipo_consumo',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de Consumo',
    'input' => 'select',
    'options' => 
    array (
      0 => 'Socio',
      1 => 'Estudiante',
    ),
    'validate' => 'required',
    'pk' => 'id_comanda',
  ),
  'comentarios' => 
  array (
    'field' => 'comentarios',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_comanda',
  ),
  'id_ficha_prepago' => 
  array (
    'field' => 'id_ficha_prepago',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Ficha Prepago',
    'input' => 'select',
    'selectBy' => 'id_cliente',
    'validate' => 0,
    'idForeign' => 'id_prepago',
    'table' => 'hbf_prepagos',
    'pk' => 'id_comanda',
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
    'label' => 'Estado de la comanda',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'debe',
      1 => 'pagado',
    ),
    'validate' => 0,
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
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
    'pk' => 'id_comanda',
  ),
);
    const tableForeignKeys = array (
  'hbf_comandas_ibfk_1' => 
  array (
    'table' => 'hbf_clubs',
    'idLocal' => 'id_club',
    'idForeign' => 'id_club',
  ),
  'hbf_comandas_ibfk_2' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
  'hbf_comandas_ibfk_3' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_sesion',
    'idForeign' => 'id_sesion',
  ),
  'hbf_comandas_ibfk_4' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
  'hbf_comandas_ibfk_5' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'hbf_comandas_ibfk_6' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_cliente',
    'idForeign' => 'id_usuario',
  ),
  'hbf_comandas_ibfk_8' => 
  array (
    'table' => 'hbf_prepagos',
    'idLocal' => 'id_ficha_prepago',
    'idForeign' => 'id_prepago',
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
        //$this->dbforge->drop_table('hbf_comandas');
    }
}