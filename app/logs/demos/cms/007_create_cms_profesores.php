<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_profesores extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_profesor' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nombres' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'ap_paterno' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'ap_materno' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'ci' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
            'mobile_1' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
            ),
            'mobile_2' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
            ),
            'edad' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'phone_1' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
            ),
            'phone_2' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
            ),
            'date_birth' => array(
                'type' => 'DATE',
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
        $this->dbforge->add_key('id_profesor', TRUE);
        $this->create_or_alter_table('cms_profesores',$settings);

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