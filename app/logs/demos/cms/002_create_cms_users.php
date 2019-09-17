<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/9/2017
 * Time: 2:13 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_users extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'placeholder' => 'Nombre del Usuario',
                'after' => 'id_user'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'placeholder' => 'Introduce tu email',
                'after' => 'name'
            ),
            'lastname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unsigned' => TRUE,
                'default' => "",
                'placeholder' => 'Apellido del usuario'
            ),
            'mobile_number_1' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
                'after' => 'lastname',
                'placeholder' => 'Introduce un numero de celular'
            ),
            'mobile_number_2' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
                'after' => 'mobile_number_1',
                'placeholder' => 'Introduce un numero de celular'
            ),
            'ci' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'placeholder' => 'Introduce un Carnet de identidad'
            ),
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '500',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'placeholder' => 'Introduce una contraseña',
                'after' => 'img'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 'enabled',
                'value' => 'enabled',
                'hidden' => true,
            ),
            'date_created' => array(
                'type' => 'DATETIME',
            ),
            'date_modified' => array(
                'type' => 'DATETIME',
            ),
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_user', TRUE);
        $this->create_or_alter_table('cms_users');

        $modelOptions = array(
            'rules' => array(
                'rules' => array(
                    'exepts' => ['id','img'],
                    'only' => []
                ),
                'rules_login' => array(
                    'exepts' => ['password_confirm'],
                    'only' => ['email','password']
                ),
                'rules_edit' => array(
                    'exepts' => ['id','img','password','password_confirm'],
                    'only' => []
                ),
            ),
        );

        $settings = array(
            'listed' => 'enabled',
            'status' => 'enabled',
            'icon' => '<i class="fa fa-user" aria-hidden="true"></i>',
            'ctrl' => true,
            'model' => $modelOptions,
            'views' => true,
        );

        $this->set_settings($settings);
    }

    public function down()
    {
        $this->dbforge->drop_table('cms_users');
    }
}