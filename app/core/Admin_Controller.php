<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/8/2017
 * Time: 2:28 AM
 *
 * @property CI_Form_validation $form_validation
 * @property CI_Encryption $encryption
 * @property CI_Session $session

 *
 */

class Admin_Controller extends ES_Backend_Controller
{
    public $load;
    public $session;
    public $db;
    public $dbforge;

    function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'Herbalife - Command System';
    }

}