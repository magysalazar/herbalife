<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:08 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Prepagos extends Trait_Prepagos {

    protected $_order_by = "id_prepago desc";
    protected $_timestaps = true;
    public $_table_name = "hbf_prepagos";
    public $_primary_key = "id_prepago";
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