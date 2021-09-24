<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
/*$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');*/
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('view');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->setDefaultController('Pages');

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
//$routes->get('/login/auth', 'Login::auth');
$routes->match(['get','post'],'/login/auth', 'Login::auth'); //This is a syntax I was wholly unaware was necessary for this sort of thing. Either I read the documentation wrong, or the documentation needs to be better.
$routes->get('/login/logout', 'Login::logout');
$routes->get('/logout', 'Login::logout');
$routes->get('/login', 'Login::index');
//$routes->get('register/save', 'Register::save');
$routes->get('/register', 'Register::index');
$routes->match(['get','post'],'register/save', 'Register::save');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/', 'Pages::view');
$routes->get('(:any)', 'Pages::view/$1');

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
