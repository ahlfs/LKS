<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Auth

$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

$routes->post('/auth/valid_login', 'AuthController::valid_login');
$routes->post('/auth/valid_register', 'AuthController::valid_register');

//Anonymous / Users
$routes->get('/', 'UsersController::index');
$routes->get('/moviedetail/(:num)', 'UsersController::moviedetail/$1');
$routes->post('/search', 'UsersController::search');

//Subscriber
$routes->post('/ratemovie/(:num)', 'SubscriberController::ratemovie/$1');
//Author
$routes->get('/addmovie', 'AuthorController::addmovie');
$routes->post('/submitmovie', 'AuthorController::submitmovie');
$routes->get('/editmovie/(:num)', 'AuthorController::editmovie/$1');
$routes->post('/updatemovie/(:num)', 'AuthorController::updatemovie/$1');
$routes->get('/deletemovie/(:num)', 'AuthorController::deletemovie/$1');
$routes->get('/mymovie', 'AuthorController::mymovie');


//Admin
$routes->get('/usercontrol', 'AdminController::usercontrol');

$routes->get('/edituser/(:num)', 'AdminController::edituser/$1');
$routes->post('/updateuser/(:num)', 'AdminController::updateuser/$1');
$routes->get('/deleteuser/(:num)', 'AdminController::deleteuser/$1');
