<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_practicas extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_practica' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'titulo' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'num_ejercicios' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'num_nota' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'id_alumno' => array(
                'type' => 'int',
                'unsigned' => true,
                'default' => null,
                'constraint' => '11',
            ),
            'id_profesor' => array(
                'type' => 'int',
                'unsigned' => true,
                'default' => null,
                'constraint' => '11',
            ),
        );
        $keys = array(
            'fk_id_alumno' => array(
                'table' => 'cms_alumnos',
                'id' => 'id_alumno',
            ),
            'fk_id_profesor' => array(
                'table' => 'cms_profesores',
                'id' => 'id_profesor'
            )
        );

        $settings = array(
            'listed' => 'enabled',
            'status' => 'enabled',
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_practica',true);
        $this->dbforge->add_key($keys);
        $this->create_or_alter_table('cms_practicas',$settings);

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