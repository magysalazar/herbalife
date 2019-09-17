<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_examenes extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_examen' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'num_ejercicios' => array(
                'type' => 'INT',
                'placeholder' => 'Numero de ejercicios',
                'constraint' => 11,
            ),
            'num_nota' => array(
                'type' => 'INT',
                'placeholder' => 'Nota del examen',
                'constraint' => 11,
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
        $this->dbforge->add_key('id_examen', TRUE);
        $this->create_or_alter_table('cms_examenes',$settings);

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