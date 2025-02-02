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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Login_c/index';
$route['admin'] = 'Login_c/index';
$route['404_override'] = 'Customer_c/index';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'Home_admin_c/index';
$route['campaign'] = 'page/Report_c/campaign';
$route['prizes'] = 'page/Report_c/prizes';
$route['summary'] = 'page/Report_c/summary_aggregate';
$route['usage/(.+)'] = 'Home_admin_c/getDataUsage/$1';
$route['user'] = 'page/Report_c/user_account';
$route['logout'] = 'Login_c/logout';
$route['login'] = 'Login_c/check_login';
$route['change_password'] = 'User_c/update_password';
$route['job/(.+)'] = 'page/Report_c/job/$1';
$route['validation'] = 'page/Report_c/history_validation';
$route['redeem'] = 'page/Report_c/redeem';