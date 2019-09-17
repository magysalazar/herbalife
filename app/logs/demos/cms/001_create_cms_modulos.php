<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_modulos extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_modulo' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'primary_key' => true,
                'first' => TRUE,
            ),
            'titulo' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => null,
                'placeholder' => 'Introduce un titulo'
            ),
            'url' => array(
                'type' => 'varchar',
                'constraint' => '600',
                'default' => null,
                'after' => 'titulo',
                'placeholder' => 'Introduce la Url'
            ),
            'descripcion' => array(
                'type' => 'text',
                'default' => null,
                'after' => 'url'
            ),
            'icon' => array(
                'type' => 'varchar',
                'constraint' => '200',
                'default' => null,
                'after' => 'descripcion',
                'placeholder' => 'Introduce tu icono html'
            ),
            'opt_estado' => array(
                'type' => 'VARCHAR',
                'options' => ['enabled','disabled'],
                'placeholder' => 'Establece el estado del modulo',
                'constraint' => '15',
                'label' => 'estado',
                'after' => 'descripcion'
            ),
            'opt_listado' => array(
                'type' => 'VARCHAR',
                'options' => ['enabled','disabled'],
                'placeholder' => 'Establece si el modulo sera listado en el menu de modulos',
                'constraint' => '15',
                'label' => 'estado',
                'after' => 'descripcion'
            ),
            'date_created' => array(
                'type' => 'DATETIME',
                'default' => null,
                'after' => 'opt_estado'
            ),
            'date_modified' => array(
                'type' => 'DATETIME',
                'default' => null,
                'after' => 'date_created'
            ),
        );
        $settings = array(
            'icon' => ''
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_modulo', TRUE);
        $this->create_or_alter_table('cms_modulos');

        $actions = array(
            'ctrl' => $this->create_ctrl(),
            'model' => $this->create_model(),
            'views' => $this->create_view_files(),

        );
    }

    public function down()
    {

    }
}