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

$routes->setAutoRoute(true);



/*

 * --------------------------------------------------------------------

 * Route Definitions

 * --------------------------------------------------------------------

 */



// We get a performance increase by specifying the default

// route since we don't have to scan directories.

$routes->get('/', 'Frontend::index');

$routes->get('/about', 'Frontend::about');

$routes->get('/blog', 'Frontend::blog');

$routes->get('api/load-blogs', 'Frontend::loadMoreBlog');

$routes->get('/blog-details/(:any)', 'Frontend::blog_details/$1');

$routes->get('/allied-services', 'Frontend::allied_services');

$routes->get('/corporate-travel', 'Frontend::corporate_travel');

$routes->get('/holiday-package', 'Frontend::holiday_package');

$routes->get('/luxury', 'Frontend::luxury');

$routes->get('/mice', 'Frontend::mice');

// $routes->get('/contact-us', 'Frontend::contact_us');

// $routes->post('contact-us', 'Frontend::contact_us');

$routes->post('api/contact-us', 'Frontend::contact_us');

$routes->get('privacypolicy', 'Frontend::privacypolicy');


$routes->get('/promos-details/(:any)', 'Frontend::promos_details/$1');

$routes->get('/promos', 'Frontend::promos');

$routes->get('/social-functions', 'Frontend::social_functions');

$routes->post('save-enquire', 'Frontend::saveEnquire');

$routes->get('/mail', 'Frontend::mailTest');

/* Admin Panel */
// $routes->get('/Admin', 'Admin/User::login');
$routes->get('/(admin|Admin)', 'Admin/User::login');

$routes->get('/forgot-password', 'Admin/User::forgot_password');

$routes->get('/Dashboard', 'Admin/User::index');













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
