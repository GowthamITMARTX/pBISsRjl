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


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/home';
$route['subscribe'] = 'home/subscribe';
$route['about'] = 'home/about';
$route['contacts'] = 'home/contacts';
$route['search'] = 'home/search';
$route['product/getById'] = 'product/getById';
$route['product/change'] = 'product/change';
$route['hot-collection'] = 'category/collection/hot_collection';
$route['top-products'] = 'category/collection/top_product';
$route['new-arrivals'] = 'category/collection/new_arrivals';
$route['articles/(:any)'] = 'articles/index/$1';



$route['category/(.+)/(.+)/(.+)'] = category_3("$1","$2",'$3');
function category_3 ($p1,$p2,$p3){
    $p = json_encode(array($p1,$p2,$p3));
    return "category/index/{$p}";
};

$route['category/(.+)/(.+)'] = category_2("$1","$2");

function category_2 ($p1,$p2){
    $p = json_encode(array($p1,$p2));
    return "category/index/{$p}";
};

$route['category/(.+)'] = category_1 ("$1");
function category_1 ($p1){
    $p = json_encode(array($p1));
    return "category/index/{$p}";
};

$route['product/(.+)/(.+)/(.+)/(.+)'] = product_4 ("$1","$2",'$3','$4');
function product_4 ($p1,$p2,$p3,$p4){
    $p = json_encode(array($p1,$p2,$p3));
    return "product/index/{$p}/{$p4}";
};

$route['product/(.+)/(.+)/(.+)'] = product_3 ("$1","$2",'$3');
function product_3($p1,$p2,$p3){
    $p = json_encode(array($p1,$p2));
    return "product/index/{$p}/{$p3}";
};

$route['product/(.+)/(.+)'] = product_2 ("$1","$2");
function product_2($p1,$p2){
    $p = json_encode(array($p1));
    return "product/index/{$p}/{$p2}";
};

$route['product/(.+)'] = product_1 ("$1");
function product_1 ($p2){
    $p = json_encode(array());
    return "product/index/{$p}/{$p2}";
};