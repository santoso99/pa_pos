<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| MASTER DATA BRAND
| -------------------------------------------------------------------------
*/
$route['master/brand']					= 'master/Brand';
$route['master/brand/store']				= 'master/Brand/store';
$route['master/brand/update']				= 'master/Brand/update';

/*
| -------------------------------------------------------------------------
| MASTER DATA CATEGORY
| -------------------------------------------------------------------------
*/
$route['master/kategori']					= 'master/Kategori';
$route['master/kategori/store']				= 'master/Kategori/store';
$route['master/kategori/update']				= 'master/Kategori/update';
