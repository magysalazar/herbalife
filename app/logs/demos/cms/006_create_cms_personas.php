<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_personas extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_persona' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nombres' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Nombre de la persona',
                'constraint' => '100',
            ),
            'ap_paterno' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Apellido paterno de la persona',
                'constraint' => '100',
            ),
            'ap_materno' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Apellido materno de la persona',
                'constraint' => '100',
            ),
            'ci' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Carnet de identidad',
                'constraint' => '10',
            ),
            'opt_role' => array(
                'type' => 'VARCHAR',
                'options' => [['profesor'=>'checked'],'estudiante','director','secretaria','regente'],
                'placeholder' => 'Introdusca el role de la persona',
                'constraint' => '10',
                'label' => 'Roles'
            ),
            'role' => array(
                'type' => 'VARCHAR',
                'input' => 'dropdown',
                'options' => array(
                    'profesor' => 'Profesor',
                    'estudiante' => 'Estudiante',
                    'director' => 'Director',
                    'secretaria' => 'Secretaria',
                    'regente' => 'Regente',
                ),
                'option_selected' => 'profesor',
                'placeholder' => 'Introdusca el role de la persona',
                'constraint' => '10',
                'label' => 'Roles'
            ),
            'role2' => array(
                'type' => 'VARCHAR',
                'multiselect' => true,
                'options' => array(
                    'profesor' => 'Profesor',
                    'estudiante' => 'Estudiante',
                    'director' => 'Director',
                    'secretaria' => 'Secretaria',
                    'regente' => 'Regente',
                ),
                'options_selected' => ['profesor','estudiante'],
                'placeholder' => 'Introdusca el role de la persona',
                'constraint' => '300',
                'label' => 'Roles'
            ),
            'mobile_1' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Telefono celular 1',
                'constraint' => '12',
            ),
            'mobile_2' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Telefono celular 2',
                'constraint' => '12',
                'validate' => false
            ),
            'edad' => array(
                'type' => 'INT',
                'placeholder' => 'edad',
                'constraint' => 11,
            ),
            'phone_1' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Telefono 1',
                'constraint' => '12',
            ),
            'phone_2' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Telefono 2',
                'constraint' => '12',
                'validate' => false
            ),
            'date_birth' => array(
                'type' => 'DATE',
                'placeholder' => 'Fecha de nacimiento',
            ),
            'date_created' => array(
                'type' => 'DATETIME',
            ),
            'date_modified' => array(
                'type' => 'DATETIME',
            ),
        );
        $settings = array(
            'listed' => 'enabled',
            'status' => 'enabled',
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_persona', TRUE);
        $this->create_or_alter_table('cms_personas', $settings);

        $actions = array(
            'ctrl' => $this->create_ctrl(),
            'model' => $this->create_model(),
            'views' => $this->create_view_files()
        );
    }

    public function down()
    {
        //$this->dbforge->drop_table('cms_alumnos');
    }
}