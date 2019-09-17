<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/10/2017
 * Time: 11:24 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_pages extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_page' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'order_page' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'body' => array(
                'type' => 'TEXT',
            ),
        ));
        $settings = array(
            'listed' => 'enabled',
            'status' => 'enabled',
        );

        $this->dbforge->add_key('id_page',true);
        $this->create_or_alter_table('cms_pages',$settings);

        $actions = array(
            'ctrl' => $this->create_ctrl(),
            'model' => $this->create_model(),
            'views' => $this->create_view_files()
        );
    }

    public function down()
    {
        //$this->dbforge->drop_table('cms_pages');
    }
}