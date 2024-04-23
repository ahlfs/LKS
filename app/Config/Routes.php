<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');

$routes->post('/auth/valid_login', 'AuthController::valid_login');
$routes->post('/auth/valid_register', 'AuthController::valid_register');

//Author
$routes->get('/addmovie', 'AuthorController::addmovie');
$routes->post('/submitmovie', 'AuthorController::submitmovie');

$routes->get('/mymovie', 'AuthorController::mymovie');


//Admin
$routes->get('/usercontrol', 'AdminController::usercontrol');
