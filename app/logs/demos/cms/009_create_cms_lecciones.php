<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_lecciones extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_leccion' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'titulo' => array(
                'type' => 'VARCHAR',
                'placeholder' => 'Ingrese el titulo de la leccion',
                'constraint' => '500',
            ),
            'num_leccion' => array(
                'type' => 'INT',
                'placeholder' => 'Numero de la leccion',
                'constraint' => 11,
            ),
            'num_practicas' => array(
                'type' => 'INT',
                'placeholder' => 'Numero de practicas',
                'constraint' => '100',
            ),
            'date_examen' => array(
                'type' => 'DATETIME',
                'placeholder' => 'Fecha de examen',
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
        $this->dbforge->add_key('id_leccion', TRUE);
        $this->create_or_alter_table('cms_lecciones',$settings);

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