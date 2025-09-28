<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// It will execute the 'index' method in the 'AuthController'
$routes->get('admin/login', 'AuthController::index', ['as' => 'admin.login']);

// It will execute the 'login' method in the 'Authcontroller'
$routes->post('admin/login', 'AuthController::login');

// It will execute the 'logout' method in the 'Authcontroller'
$routes->get('admin/logout', 'AuthController::logout', ['as' => 'admin.logout']);

$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    // It will execute the 'index' method in the 'DashboardController'
    $routes->get('dashboard', 'Admin\DashboardController::index', ['as' => 'admin.dashboard']);

    // All standard CRUD routes for categories
    $routes->resource('categories', ['controller' => 'Admin\CategoryController']);
});