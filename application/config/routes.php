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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['userdata'] = 'userdata/index';
$route['supervisor'] = 'supervisor/index';
$route['editbjp/(:any)'] = 'userdata/edit/$1';
$route['grampanchayat/index/(:any)'] = 'grampanchayat/index/$1';
$route['gram/index/(:any)'] = 'gram/index/$1';
$route['ward/index/(:any)'] = 'ward/index/$1';
$route['userdata/index/(:any)'] = 'userdata/index/$1';
$route['alluserdata'] = 'userdata/alluserdata';
$route['dataactinact'] = 'userdata/dataactinact';
$route['bjpuserdata'] = 'userdata/bjpuserdata';
$route['congressuserdata'] = 'userdata/congressuserdata';
$route['fakedata'] = 'userdata/fakedata';
$route['varified_data'] = 'userdata/varified_data';
$route['master'] = 'master/index';
$route['add_parent_level'] = 'master/add_parent_level';
$route['reloadparentdiv'] = 'master/getparentlist';
$route['getchilddetails'] = 'master/getchilddetails';
$route['add_child'] = 'master/add_child_level';
$route['add_people'] = 'master/add_people';

$route['shop_owner'] = 'master/shop_owner';
$route['getpeoplelist/(:any)'] = 'master/getpeople/$1';
$route['camp_details'] = 'Campaign/camp_details';
$route['leveldata/(:any)/(:any)'] = 'master/leveldata/$1/$1';



