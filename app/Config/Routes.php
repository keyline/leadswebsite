<?php

namespace Config;


// Create a new instance of our RouteCollection class.

$routes = Services::routes();



// Load the system's routing file first, so that the app and ENVIRONMENT

// can override as needed.

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {

	require SYSTEMPATH . 'Config/Routes.php';
}



/**

 * --------------------------------------------------------------------

 * Router Setup

 * --------------------------------------------------------------------

 */

$routes->setDefaultNamespace('App\Controllers');

$routes->setDefaultController('Home');

$routes->setDefaultMethod('index');

$routes->setTranslateURIDashes(false);

$routes->set404Override();

$routes->setAutoRoute(false);



/*

 * --------------------------------------------------------------------

 * Route Definitions

 * --------------------------------------------------------------------

 */



// We get a performance increase by specifying the default

// route since we don't have to scan directories.

$routes->get('/', 'Frontend::index');

$routes->get('/about', 'Frontend::about');
$routes->get('/distributor', 'Frontend::distributor');
$routes->match(['get', 'post'],'/demo', 'Frontend::demo');
// $routes->match(['get', 'post'], '/get_products_by_category', 'Frontend::get_products_by_category');
$routes->post('/get_products_by_category', 'Frontend::get_products_by_category');
$routes->get('/return-policy', 'Frontend::returnPolicy');
$routes->get('/amc-policy', 'Frontend::amcPolicy');

$routes->get('/blog', 'Frontend::blog');
$routes->get('api/load-blogs', 'Frontend::loadMoreBlog');
$routes->get('/product/(:any)', 'Frontend::product/$1');
$routes->get('/product-details/(:any)', 'Frontend::product_details/$1');
$routes->get('api/load_more_products', 'Frontend::load_more_products');

$routes->get('/blog-details/(:any)', 'Frontend::blog_details/$1');

$routes->get('/media/(:any)', 'Frontend::media/$1');

$routes->get('/page/(:any)', 'Frontend::page/$1');

$routes->get('/contact', 'Frontend::contact_us');

$routes->get('/career', 'Frontend::career');

$routes->match(['get', 'post'], '/service', 'Frontend::service_request');

$routes->match(['get', 'post'], '/registration','Frontend::product_registration');
$routes->match(['get', 'post'], '/offer','Frontend::offer');

$routes->get('/amc', 'Frontend::amc_request');

$routes->post('api/amc-request', 'Frontend::amc_submit');

$routes->post('api/get-products', 'Frontend::get_products');

$routes->post('api/contact-us', 'Frontend::enquiry');

$routes->post('api/distributor-enquiry', 'Frontend::distributorenquiry');

$routes->post('api/apply-job', 'Frontend::job_apply');

$routes->get('privacypolicy', 'Frontend::privacypolicy');



$routes->get('/mail', 'Frontend::mailTest');

/* Admin Panel */
// $routes->get('/Admin', 'Admin/User::login');
// $routes->get('/(admin|Admin)', 'Admin/User::login');

// $routes->match(['get', 'post'], '/(admin|Admin)', 'Admin\User::login');

$routes->get('/Admin', 'Admin\User::login');
$routes->post('/Admin', 'Admin\User::login');
$routes->get('/admin', 'Admin\User::login');
$routes->post('/admin', 'Admin\User::login');

$routes->get('/forgot-password', 'Admin/User::forgot_password');

// $routes->get('/Dashboard', 'Admin/User::index');
$routes->get('/Dashboard', 'Admin\User::index');

$routes->get('/admin/user/logout', 'Admin\User::logout');
$routes->match(['get', 'post'], '/admin/user/site_setting', 'Admin\User::site_setting');
$routes->match(['get', 'post'], '/admin/user/change_password', 'Admin\User::change_password');
$routes->match(['get', 'post'], '/admin/user/email_setting', 'Admin\User::email_setting');


$routes->match(['get', 'post'], '/admin/Manage_client', 'Admin\Manage_client::index');
$routes->match(['get', 'post'], '/admin/manage_metadetails', 'Admin\Manage_metadetails::index');

$routes->match(['get', 'post'], '/admin/manage_product', 'Admin\Manage_product::index');
$routes->match(['get', 'post'], '/admin/manage_product/add', 'Admin\Manage_product::add');
$routes->match(['get', 'post'], '/admin/manage_product/edit/(:any)', 'Admin\Manage_product::edit/$1');
$routes->match(['get', 'post'], '/admin/manage_product/confirm_delete/(:any)', 'Admin\Manage_product::confirm_delete/$1');
$routes->get('/admin/manage_product/deactive/(:any)', 'Admin\Manage_product::deactive/$1');
$routes->get('/admin/manage_product/active/(:any)', 'Admin\Manage_product::active/$1');
$routes->match(['get', 'post'], '/admin/manage_product/image_list/(:any)', 'Admin\Manage_product::image_list/$1');
$routes->match(['get', 'post'], '/admin/manage_product/edit_image/(:any)', 'Admin\Manage_product::edit_image/$1');
$routes->get('/admin/manage_product/delete_image/(:any)', 'Admin\Manage_product::delete_image/$1');

$routes->match(['get', 'post'], '/admin/manage_enquire', 'Admin\Manage_enquire::index');
$routes->get('/admin/manage_enquire/download_csv', 'Admin\Manage_enquire::download_csv');
$routes->get('/admin/manage_enquire/subscribers', 'Admin\Manage_enquire::subscribers');
$routes->get('/admin/manage_enquire/subscribers_csv', 'Admin\Manage_enquire::subscribers_csv');
$routes->get('/admin/manage_enquire/contactsList', 'Admin\Manage_enquire::contactsList');
$routes->get('/admin/manage_enquire/contact_csv', 'Admin\Manage_enquire::contact_csv');

$routes->match(['get', 'post'], '/admin/manage_amc_enquire', 'Admin\Manage_amc_enquire::index');
$routes->get('/admin/manage_amc_enquire/download_csv', 'Admin\Manage_amc_enquire::download_csv');
$routes->get('/admin/manage_amc_enquire/subscribers', 'Admin\Manage_amc_enquire::subscribers');
$routes->get('/admin/manage_amc_enquire/subscribers_csv', 'Admin\Manage_amc_enquire::subscribers_csv');
$routes->get('/admin/manage_amc_enquire/contactsList', 'Admin\Manage_amc_enquire::contactsList');
$routes->get('/admin/manage_amc_enquire/contact_csv', 'Admin\Manage_amc_enquire::contact_csv');

// $routes->match(['get', 'post'], '/admin/manage_distributor_enquire', 'Admin\Manage_distributor_enquire::index');
$routes->match(['get', 'post'], '/admin/Manage_distributor_enquire', 'Admin\Manage_distributor_enquire::index');
// $routes->get('/admin/manage_distributor_enquire/download_csv', 'Admin\Manage_distributor_enquire::download_csv');
$routes->get('/admin/Manage_distributor_enquire/download_csv', 'Admin\Manage_distributor_enquire::download_csv');

$routes->match(['get', 'post'], '/admin/Manage_amc_enquire', 'Admin\Manage_amc_enquire::index');
$routes->match(['get', 'post'], '/admin/Manage_services', 'Admin\Manage_services::index');
$routes->match(['get', 'post'], '/admin/Manage_services/(:any)', 'Admin\Manage_services::$1');
$routes->match(['get', 'post'], '/admin/Manage_product_registration', 'Admin\Manage_product_registration::index');
$routes->match(['get', 'post'], '/admin/Manage_product_registration/(:any)', 'Admin\Manage_product_registration::$1');
$routes->match(['get', 'post'], '/admin/manage_certificates', 'Admin\Manage_certificates::index');
$routes->match(['get', 'post'], '/admin/manage_certificates/(:any)', 'Admin\Manage_certificates::$1');
$routes->match(['get', 'post'], '/admin/about_setting', 'Admin\About_setting::index');
$routes->match(['get', 'post'], '/admin/about_setting/(:any)', 'Admin\About_setting::$1');
$routes->match(['get', 'post'], '/admin/manage_blog_category', 'Admin\Manage_blog_category::index');
$routes->match(['get', 'post'], '/admin/manage_blog_category/(:any)', 'Admin\Manage_blog_category::$1');
$routes->match(['get', 'post'], '/admin/manage_blog', 'Admin\Manage_blog::index');
$routes->match(['get', 'post'], '/admin/manage_blog/(:any)', 'Admin\Manage_blog::$1');
$routes->match(['get', 'post'], '/admin/Manage_video_media', 'Admin\Manage_video_media::index');
$routes->match(['get', 'post'], '/admin/Manage_video_media/(:any)', 'Admin\Manage_video_media::$1');
$routes->match(['get', 'post'], '/admin/Manage_image_media', 'Admin\Manage_image_media::index');
$routes->match(['get', 'post'], '/admin/Manage_image_media/(:any)', 'Admin\Manage_image_media::$1');
$routes->match(['get', 'post'], '/admin/manage_product_category', 'Admin\Manage_product_category::index');
$routes->match(['get', 'post'], '/admin/manage_product_category/(:any)', 'Admin\Manage_product_category::$1');
$routes->match(['get', 'post'], '/admin/manage_key_feature', 'Admin\Manage_key_feature::index');
$routes->match(['get', 'post'], '/admin/manage_key_feature/(:any)', 'Admin\Manage_key_feature::$1');
$routes->match(['get', 'post'], '/admin/manage_warrenty_section', 'Admin\Manage_warrenty_section::index');
$routes->match(['get', 'post'], '/admin/manage_warrenty_section/(:any)', 'Admin\Manage_warrenty_section::$1');
$routes->match(['get', 'post'], '/admin/Manage_career', 'Admin\Manage_career::index');
$routes->match(['get', 'post'], '/admin/Manage_career/(:any)', 'Admin\Manage_career::$1');
$routes->match(['get', 'post'], '/admin/Manage_applicants', 'Admin\Manage_applicants::index');
$routes->match(['get', 'post'], '/admin/Manage_applicants/(:any)', 'Admin\Manage_applicants::$1');
$routes->match(['get', 'post'], '/admin/manage_testimonial', 'Admin\Manage_testimonial::index');
$routes->match(['get', 'post'], '/admin/manage_testimonial/(:any)', 'Admin\Manage_testimonial::$1');
$routes->match(['get', 'post'], '/admin/Manage_download', 'Admin\Manage_download::index');
$routes->match(['get', 'post'], '/admin/Manage_download/(:any)', 'Admin\Manage_download::$1');
$routes->match(['get', 'post'], '/admin/Manage_content_page', 'Admin\Manage_content_page::index');
$routes->match(['get', 'post'], '/admin/Manage_content_page/(:any)', 'Admin\Manage_content_page::$1');
$routes->match(['get', 'post'], '/admin/Pop_up_setting', 'Admin\Pop_up_setting::index');
$routes->match(['get', 'post'], '/admin/Pop_up_setting/(:any)', 'Admin\Pop_up_setting::$1');
$routes->match(['get', 'post'], '/admin/Home_page_video_settings', 'Admin\Home_page_video_settings::index');
$routes->match(['get', 'post'], '/admin/Home_page_video_settings/(:any)', 'Admin\Home_page_video_settings::$1');
$routes->match(['get', 'post'], '/admin/Products_video_setting', 'Admin\Products_video_setting::index');
$routes->match(['get', 'post'], '/admin/Products_video_setting/(:any)', 'Admin\Products_video_setting::$1');

/* Admin Panel */







/* Frontend api */

$routes->post('api/enquire', 'Frontend::bookEnquire');

$routes->post('api/sendMail', 'Frontend::mailSend');

$routes->post('api/promoPackages', 'Frontend::getPromos');

$routes->post('api/subscribe', 'Frontend::subscribe');



/* Frontend api */



/*

 * --------------------------------------------------------------------

 * Additional Routing

 * --------------------------------------------------------------------

 *

 * There will often be times that you need additional routing and you

 * need it to be able to override any defaults in this file. Environment

 * based routes is one such time. require() additional route files here

 * to make that happen.

 *

 * You will have access to the $routes object within that file without

 * needing to reload it.

 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {

	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
