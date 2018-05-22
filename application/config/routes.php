<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/map/(:any)/(:any)'] = 'admin/LocationController/$1/$2';
$route['admin/map/(:any)'] = 'admin/LocationController/$1';
$route['admin/alarm/(:any)'] = 'admin/AlarmController/$1';
$route['admin/advertise/(:any)'] = 'admin/Advertisement/$1';
$route['admin/user/(:any)/(:any)'] = 'admin/UserController/$1/$2';
$route['admin/user/(:any)'] = 'admin/UserController/$1';
$route['admin/dash/(:any)'] = 'admin/DashController/$1';
$route['admin/dash'] = 'admin/DashController';
$route['admin/auth/(:any)'] = 'admin/AuthController/$1';
$route['admin'] = 'admin/AuthController/index';
$route['default_controller'] = 'admin/AuthController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
