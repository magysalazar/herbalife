<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 18/07/2018
 * Time: 3:09 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Turnos extends Trait_Turnos {

    protected $_order_by = "id_turno desc";
    protected $_timestaps = true;
    public $_table_name = "hbf_turnos";
    public $_primary_key = "id_turno";
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