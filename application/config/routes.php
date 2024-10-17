<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['administrator']='admin/login';
$route['administrator/logout']='admin/login/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
