<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 2/22/2018
 * Time: 12:01 AM
 */

class ES_Backend_Controller extends MY_Controller
{
    public function init(){

    }

    function __construct()
    {
        $this->initLoaded();
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
//        $this->load->library('request');
        $this->load->library('encryption');
//        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');


        if(validate_modulo('base','usuarios')) {
            $this->load->model('base/model_usuarios');
        }
        if(validate_modulo('base','sessions')) {
            $this->load->library('session');
            $this->session->userTable = 'ci_usuarios';
            $this->session->userIdTable = 'id_usuario';
            $this->session->sessKey = config_item('sess_key_admin');
            $sessUserData = null;

            if ($this->session->isLoguedin()) {
                $this->data['subLayout'] = $this->uri->segment(1) == 'base' ? 'backend/base/_subLayout' : 'backend/admin/_subLayout';
                $this->CI->data['subview'] = 'admin/dashboard/index';
                $sessUserData = (object)$this->session->get_userdata()[config_item('sess_key_admin')];

                $this->data['oUsuario'] = $sessUserData;
                $oUser = $this->oUserLogguedIn = CiUsuariosQuery::create()->findOneByIdUsuario($sessUserData->id_usuario);
                $oUserIdClub = $oUser->getIdClub() ? $oUser->getIdClub() : 1;
                $oClubUser = $this->oClubUser = HbfClubsQuery::create()->findOneByIdClub($oUserIdClub);
                $oTurnoUser = $this->oTurnoUser= HbfTurnosQuery::create()->findOneByIdClub($oClubUser->getIdClub());
                $oSessionUser = $this->oSesionUser = HbfSesionesQuery::create()->findOneByIdClub($oClubUser->getIdClub());


                $this->data['idClubSess'] = $oClubUser->getIdClub();
                $this->data['oClubSess'] = HbfClubsQuery::create()->findOneByIdClub($oClubUser->getIdClub());
                $this->data['idTurnoSess'] = $oTurnoUser->getIdTurno();
                $this->data['oTurnoSess'] = HbfTurnosQuery::create()->findOneByIdTurno($oTurnoUser->getIdTurno());
                $this->data['idSesionSess'] = is_object($oSessionUser) ? $oSessionUser->getIdSesion() : null;
                $this->data['oSessionSess'] = is_object($oSessionUser) ? HbfSesionesQuery::create()->findOneByIdSesion($oSessionUser->getIdSesion()) : null;

            } else {
                $this->data['subLayout'] = 'start';
                if ($this->input->post('login') == 'Registrarse') {
                    $this->session->signUp();
                } else if ($this->input->post('login') == 'Ingresar') {
                    $this->session->login();
                }
            }

            if(validate_modulo('base','modulos')){
                $this->load->model('base/model_modulos');
                $this->data['oSysOptions'] = CiOptionsQuery::create()->find();
                $this->data['oSysSettings'] = CiSettingsQuery::create()->find();
                $this->data['oSysOptionsForModules'] = CiOptionsQuery::create()
                    ->filterByIdSetting(1)
                    ->find();

                if (is_object($sessUserData)) {
                    if($sessUserData->id_opcion_role == 1){
                        $this->data['oSysModulos'] = CiModulosQuery::create()->find();
                    } else {
                        $this->data['oSysModulos'] = CiModulosQuery::create()->
                        filterByIdOpcionRoles($sessUserData->id_opcion_role)->
                        find();
                    }
                }
            }
        }
        $this->data['layout'] = $this->uri->segment(1) == 'base' ? 'backend/base/_layout' :
            ($this->uri->segment(1) == 'admin' ? 'backend/admin/_layout' :
                ($this->uri->segment(1) == 'front' ? 'frontend/_layout' : ''));
        $editTagsSet = CiSettingsQuery::create()->select(['EditTag'])->find()->getData();
        $editTagsOpt = CiOptionsQuery::create()->select(['EditTag'])->find()->getData();
        $editTags = array_merge($editTagsSet,$editTagsOpt);
        $this->data['editTags'] = $editTags;

    }
}
