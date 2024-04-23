<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');

$routes->post('/auth/valid_login', 'AuthController::valid_login');
$routes->post('/auth/valid_register', 'AuthController::valid_register');
