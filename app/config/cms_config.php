<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/1/2017
 * Time: 11:59 PM
 */
$URI =& load_class('URI', 'core');

$config['soft_user'] = 'rafaelgutierrez';
$config['site_name'] = 'Bienvenidos a herbalife.com';

$config['sess_key_admin'] = 'admin_loggedin';
$config['sess_key_base'] = 'base_loggedin';
$config['sess_key'] = 'loggedin';
$config['sess_table'] = 'ci_usuarios';
$config['sess_idTable'] = 'id_usuario';
$config['sess_object'] = 'oUsuario';

$config['mod_table'] = 'ci_modulos';
$config['mod_migIndex'] = 2;

$config['dir_modulos_views'] = 'views/';
$config['file_empty_php'] = '<?php ?>';
$config['no_backup_message'] = '// *** herbalife: No se realizo backup de este archivo ***';
$config['owner'] = 'Rafael Gutierrez Gaspar';
$config['system_name'] = 'herbalife';
$config['isys_modules'] = array('base' => 'ci');
$config['app_modules'] = array('admin' => 'hbf');
$config['tables_mvc_excepted'] = array('migrations');
$config['dirMigrationTables'] = [ROOT_PATH.'orm/migrations/tables/'];
$config['english_words'] = ['files','sessions','roles','settings'];
$config['controlFields'] = ['estado','change_count','id_user_modified','id_user_created','date_modified','date_created'];

$config['foreach_key'] = 'object';