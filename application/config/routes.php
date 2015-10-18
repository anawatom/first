<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';

// Dashboard
$route['dashboard/index'] = 'dashboard/index';

// Amphur
$route['amphur/get_html_options/(:num)'] = 'amphur/get_html_options/$1';

// Tumbol
$route['tumbol/get_html_options/(:num)'] = 'tumbol/get_html_options/$1';

// Gms_sports
$route['sports/index'] = 'gms_sports/index/$1';
$route['sports/index/(:num)'] = 'gms_sports/index/$1';
$route['sports/index/(:num)/(:any)'] = 'gms_sports/index/$1';
$route['sports/create'] = 'gms_sports/create';
$route['sports/update/(:num)'] = 'gms_sports/update/$1';
$route['sports/view/(:num)'] = 'gms_sports/view/$1';
$route['sports/delete/(:num)'] = 'gms_sports/delete/$1';
$route['sports/get_html_options_by_type_id/(:num)'] = 'gms_sports/get_html_options_by_type_id/$1';

// Gms_prefix
$route['prefix/index'] = 'gms_prefix/index/$1';
$route['prefix/index/(:num)'] = 'gms_prefix/index/$1';
$route['prefix/index/(:num)/(:any)'] = 'gms_prefix/index/$1';
$route['prefix/create'] = 'gms_prefix/create';
$route['prefix/update/(:num)'] = 'gms_prefix/update/$1';
$route['prefix/view/(:num)'] = 'gms_prefix/view/$1';
$route['prefix/delete/(:num)'] = 'gms_prefix/delete/$1';

// Gms_cancel_result
$route['cancel_result/index'] = 'gms_cancel_result/index/$1';
$route['cancel_result/index/(:num)'] = 'gms_cancel_result/index/$1';
$route['cancel_result/index/(:num)/(:any)'] = 'gms_cancel_result/index/$1';
$route['cancel_result/create'] = 'gms_cancel_result/create';
$route['cancel_result/update/(:num)'] = 'gms_cancel_result/update/$1';
$route['cancel_result/view/(:num)'] = 'gms_cancel_result/view/$1';
$route['cancel_result/delete/(:num)'] = 'gms_cancel_result/delete/$1';

// Gms_certificate_sign
$route['certificate_sign/index'] = 'gms_certificate_sign/index/$1';
$route['certificate_sign/index/(:num)'] = 'gms_certificate_sign/index/$1';
$route['certificate_sign/index/(:num)/(:any)'] = 'gms_certificate_sign/index/$1';
$route['certificate_sign/create'] = 'gms_certificate_sign/create';
$route['certificate_sign/update/(:num)'] = 'gms_certificate_sign/update/$1';
$route['certificate_sign/view/(:num)'] = 'gms_certificate_sign/view/$1';
$route['certificate_sign/delete/(:num)'] = 'gms_certificate_sign/delete/$1';

// Gms_term_position
$route['term_position/index'] = 'gms_term_position/index/$1';
$route['term_position/index/(:num)'] = 'gms_term_position/index/$1';
$route['term_position/index/(:num)/(:any)'] = 'gms_term_position/index/$1';
$route['term_position/create'] = 'gms_term_position/create';
$route['term_position/update/(:num)'] = 'gms_term_position/update/$1';
$route['term_position/view/(:num)'] = 'gms_term_position/view/$1';
$route['term_position/delete/(:num)'] = 'gms_term_position/delete/$1';

// Gms_work
// for gms_member
$route['member/(:num)/work/index'] = 'gms_work/index_for_member/$1/$2';
$route['member/(:num)/work/index/(:num)'] = 'gms_work/index_for_member/$1/$2';
$route['member/(:num)/work/create'] = 'gms_work/create_for_member/$1';
$route['member/(:num)/work/update/(:num)'] = 'gms_work/update_for_member/$1/$2';
$route['member/(:num)/work/delete/(:num)'] = 'gms_work/delete_for_member/$1/$2';


/* End of file routes.php */
/* Location: ./application/config/routes.php */