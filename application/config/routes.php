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
//Home Controller
$route['pdf/text'] = 'Home/showTextOnlyPage';
$route['pdf/text-and-image'] = 'Home/showTextImagePage';
$route['pdf/text-and-image-style'] = 'Home/showTextImageStylePage';
$route['excel'] = 'Home/showImportExcelPage';
$route['excel/export'] = 'Home/showExportExcelPage';
$route['users'] = 'Home/showUsersPage';



//PDF Controller
$route['pdf/text/add'] = 'PDF/convertText2PDF';
$route['pdf/textimage/add'] = 'PDF/convertTextImage2PDF';
$route['pdf/textstyle/add'] = 'PDF/convertTextStyleImage2PDF';


//Certificates Controller

$route['certificate/(:num)'] = 'Certificate/deleteCert/$1';
$route['certificates'] = 'Certificate';



//Excel Controller
$route['excel/upload'] = 'Excel/uploadExcel';
$route['excel/download'] = 'Excel/downloadExcel';


//Emp Controller
$route['employee'] = 'Emp';
$route['employees'] = 'Emp/showEmployees';
$route['employee/add'] = 'Emp/addEmployee';
$route['employee/delete/(:num)'] = 'Emp/deleteEmployee/$1';
$route['payslip'] = 'Emp/showPayslip';
$route['payslip/generate'] = 'Emp/generatePaySlip';


//Faker Controller
$route['faker'] = 'Faker';
$route['faker/users'] = 'Faker/generateUsers';
$route['faker/employees'] = 'Faker/generateEmployees';

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
