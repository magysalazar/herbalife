<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/8/2017
 * Time: 2:27 AM
 */

class ES_Frontend_Constroller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['layout'] = 'frontend/_layout';
        $this->data['subLayout'] = 'frontend/_subLayout';
        $this->data['meta_title'] = 'Home - Herbalife';
    }
}