<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
use Propel\Runtime\Exception\PropelException;


/**
 * @property CI_DB_query_builder $db              This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system without hacking.
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property  Middleware $middleware Middleware
 * @property  Request $request Request
 * @property  Response $response Response
 * @property  RESTful $restful RESTful
 * @property  MyOAuth2 $oauth MyOAuth2
 *
 * @property Model_Clubs $model_clubs
 * @property Model_Turnos $model_turnos
 * @property Model_Sesiones $model_sesiones
 * @property Model_Usuarios $model_usuarios
 * @property Model_Comandas $model_comandas
 * @property Model_Vasos $model_vasos
 * @property Model_Productos $model_productos
 * @property Model_Detalles_pedidos $model_detalles_pedidos
 * @property Model_Prepagos $model_prepagos
 * @property Model_Ingresos $model_ingresos
 * @property Model_Modulos $model_modulos
 * @property Model_Settings $model_settings
 * @property Model_Options $model_options
 * @property Model_Porciones $model_porciones
 * @property Model_Sessions $model_sessions
 *
 *
 * @property Model_Clubs $ctrl_clubs
 * @property Model_Turnos $ctrl_turnos
 * @property Model_Sesiones $ctrl_sesiones
 * @property Model_Usuarios $ctrl_usuarios
 * @property Model_Comandas $ctrl_comandas
 * @property Model_Vasos $ctrl_vasos
 * @property Model_Productos $ctrl_productos
 * @property Model_Detalles_pedidos $ctrl_detalles_pedidos
 * @property Model_Prepagos $ctrl_prepagos
 * @property Model_Ingresos $ctrl_ingresos
 * @property Model_Modulos $ctrl_modulos
 * @property Model_Settings $ctrl_settings
 * @property Model_Options $ctrl_options
 * @property Model_Porciones $ctrl_porciones
 * @property Model_Sessions $ctrl_sessions
 *
 * @property CiModulos $oModulo
 *
 */
class MY_Controller extends CI_Controller
{
    const STRING = 'string';
    const ARRAYS = 'array';
    const NUMERIC = 'numeric';

    public $request;
    public $response;
    public $restful;
    public $oauth;


    /**
     * @var CiUsuarios $oUserLogguedIn
     */
    public $oUserLogguedIn;

    /**
     * @var HbfTurnos $oClubUser
     */
    public $oClubUser;
    /*
     * @var HbfTurnos $oTurnoUser
     * */
    public $oTurnoUser;

    /**
     * @var HbfSesiones $oSesionUser
     */
    public $oSesionUser;

    public $data = array();

    function __construct(){
        parent::__construct();

        $this->img_path = realpath(ROOT_PATH.'assets/img/');
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }

    public function loadTemplates($view, $data = array()){
        $this->load->view("header");
        $this->load->view($view, $data);
        $this->load->view("footer");
    }

    public function initLoaded(){
        $CI=CI_Controller::get_instance();
        if($CI != null){
            foreach ($CI as $instance => $value) {
                $this->$instance = $value;
            }
        }
        if(isset($this->load)){
            $models = $this->load->_ci_models;
            foreach ($models as $alias => $name) {
                $this->$name = new $name();
            }
        }
    }

    public function loadView($path, $view = '', $idFieldEditView = '', $error = ''){
        $path = preg_replace(['/^\//','/\/$/'],'',$path);
        if(substr_count($path,'/') == 2 ){
            list($mod, $class, $method) = explode('/',$path);
            list($classSin, $classPlu) = setSubModSingularPlural($class);
            $ucClassSin = ucfirst($classSin);
            $method = validateVar($method) ? $method : $this->router->method;
            $class = validateVar($class) ? $class : $this->router->class;
            $mod = validateVar($mod) ? $mod : $this->router->module;
            if (($this->input->post('fromAjax') || compareStrStr($this->router->class,'ajax'))) {
                if (validateVar($error)){
                    if(validateVar($view)){
                        return [$this->load->view("$mod/$class/$method-$view", $this->data, true),$error];
                    } else {
                        return [$this->load->view("$mod/$class/$method", $this->data, true), $error];
                    }
                } else {
                    if(validateVar($view)){
                        return $this->load->view("$mod/$class/$method-$view", $this->data, true);
                    } else {
                        return $this->load->view("$mod/$class/$method", $this->data, true);
                    }
                }
            } else if (!$this->input->post('fromAjax') && validateVar($idFieldEditView)) {
                if (validateVar($view)) {
                    $this->{"init_$class"}(true);
                    if ($this->{"model_$class"}->_table_name == 'ci_options' || $view == 'tipo_usuario') {
                        $this->data["o$ucClassSin"]->$idFieldEditView = CiSettingsQuery::create()->findOneByEditTag("edit-$view")->getIdSetting();
                    } else {
                        $this->data["o$ucClassSin"]->$idFieldEditView = CiOptionsQuery::create()->findOneByEditTag("edit-$view")->getIdSetting();
                    }
                    $this->data["subview"] = "$mod/$class/$method-$view";
                        return $this->load->view("$mod/$class/$method-$view", $this->data, true);
                } else {
                    $this->data["subview"] = "$mod/$class/$method";
//                    return $this->load->view("$mod/$class/$method", $this->data, true);
                }
            } else {
                $this->data["subview"] = "$mod/$class/$method";
//                return $this->load->view("$mod/$class/$method", $this->data, true);
            }
        } else {

        }
    }

    public function filterIdOrView($id, $view){
        if($id == null && (validateVar($view, 'numeric') || validateVar($view, 'string'))){
            if(!in_array("edit-$view",$this->data['editTags'])){
                $id = $view ;
                $view = null;
            }
        }
        return [$id,$view];
    }

    public function init_comandas($both = false){
        if($both){
            $this->ctrl_comandas = Ctrl_Comandas::create();
        }
        $this->model_comandas = Model_Comandas::create();
    }
    public function init_clubs($both = false){
        if($both){
            $this->ctrl_clubs = Ctrl_Clubs::create();
        }
        $this->model_clubs = Model_Clubs::create();
    }
    public function init_vasos($both = false){
        if($both){
            $this->ctrl_vasos = Ctrl_Vasos::create();
        }
        $this->model_vasos = Model_Vasos::create();
    }
    public function init_porciones($both = false){
        if($both){
            $this->ctrl_porciones = Ctrl_Porciones::create();
        }
        $this->model_porciones = Model_Porciones::create();
    }
    public function init_detalles_pedidos($both = false){
        if($both){
            $this->ctrl_detalles_pedidos = Ctrl_Detalles_pedidos::create();
        }
        $this->model_detalles_pedidos = Model_Detalles_pedidos::create();
    }
    public function init_productos($both = false){
        if($both){
            $this->ctrl_productos = Ctrl_Productos::create();
        }
        $this->model_productos = Model_Productos::create();
    }
    public function init_usuarios($both = false){
        if($both){
            $this->ctrl_usuarios = Ctrl_Usuarios::create();
        }
        $this->model_usuarios= Model_Usuarios::create();
    }
    public function init_turnos($both = false){
        if($both){
            $this->ctrl_turnos = Ctrl_Turnos::create();
        }
        $this->model_turnos= Model_Turnos::create();
    }
    public function init_sesiones($both = false){
        if($both){
            $this->ctrl_sesiones = Ctrl_Sesiones::create();
        }
        $this->model_sesiones= Model_Sesiones::create();
    }
    public function init_options($both = false){
        if($both){
            $this->ctrl_options = Ctrl_Options::create();
        }
        $this->model_options= Model_Options::create();
    }
    public function init_egresos($both = false){
        if($both){
            $this->ctrl_egresos = Ctrl_Egresos::create();
        }
        $this->model_egresos = Model_Egresos::create();
    }
    public function init_ingresos($both = false){
        if($both){
            $this->ctrl_ingresos = Ctrl_Ingresos::create();
        }
        $this->model_ingresos = Model_Ingresos::create();
    }
    public function init_prepagos($both = false){
        if($both){
            $this->ctrl_prepagos = Ctrl_Prepagos::create();
        }
        $this->model_prepagos = Model_Prepagos::create();
    }
    public function init_ventas($both = false){
        if($both){
            $this->ctrl_ventas = Ctrl_Ventas::create();
        }
        $this->model_ventas = Model_Ventas::create();
    }
}
