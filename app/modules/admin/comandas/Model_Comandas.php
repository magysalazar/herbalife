<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 05/07/2018
 * Time: 6:19 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Comandas extends Trait_Comandas {

    protected $_order_by = "id_comanda desc";
    protected $_timestaps = true;
    public $_table_name = "hbf_comandas";
    public $_primary_key = "id_comanda";
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