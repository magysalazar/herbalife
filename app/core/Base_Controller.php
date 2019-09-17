<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/8/2017
 * Time: 2:28 AM
 * @property Model_usuarios $model_usuarios
 * @property CI_Form_validation $form_validation
 * @property CI_Encryption $encryption
 * @property CI_Session $session
 * @property Model_Modulos $model_modulos
 *
 */

class Base_Controller extends ES_Backend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'Herbalife - Command System';
    }

}