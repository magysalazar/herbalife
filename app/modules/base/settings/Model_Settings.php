<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 4:06 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Settings extends Trait_Settings {

    protected $_order_by = "id_setting desc";
    protected $_timestaps = true;
    public $_table_name = "ci_settings";
    public $_primary_key = "id_setting";
    private static $instance = null;

    function __construct(){
        parent::__construct();
    }

    public static function create()
    {
        if(!self::$instance){
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }
}