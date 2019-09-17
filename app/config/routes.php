<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front/dashboard';
$route['login'] = 'front/dashboard';

$route['admin'] = 'admin/dashboard';
$route['base'] = 'base/dashboard';

$route['base/ajax/([a-zA-Z].+)/([a-zA-Z]+)'] = 'base/ajax/export/$1/$2';


$route['admin/modal'] = 'admin/dashboard/modal';

// ================= Migration paths ================
$route['base/migrate/([a-zA-Z]+)/(:num)'] = 'base/migrate/run/$0/$1/$2';
$route['base/migrate/([a-zA-Z]+)/(:num)'] = 'base/migrate/run/$0/$1/$2';
$route['base/migrate/([a-zA-Z]+)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/([a-zA-Z]+)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/(:num)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/(:num)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/fromdatabase'] = 'base/migrate/fromdatabase';
// ===================================================
$route['admin/index.html'] = 'admin/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route["login"]["get"] = "auth/login";
//$route["login"]["post"] = "auth/process_login";

$route["register"]["get"] = "auth/register";
$route["register"]["post"] = "auth/process_register";

$route["logout"]["get"] = "auth/logout";
$route['translate_uri_dashes'] = FALSE;
