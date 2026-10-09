<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->match(['get', 'post'], 'login', 'Auth::login');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->post('logout', 'Auth::logout');

    $routes->get('products', 'Products::index');
    $routes->match(['get', 'post'], 'products/new', 'Products::create');
    $routes->match(['get', 'post'], 'products/edit/(:num)', 'Products::edit/$1');
    $routes->post('products/archive/(:num)', 'Products::archive/$1');

    $routes->get('customers', 'Customers::index');
    $routes->match(['get', 'post'], 'customers/new', 'Customers::create');
    $routes->match(['get', 'post'], 'customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('customers/delete/(:num)', 'Customers::delete/$1');

    $routes->get('staff', 'Staff::index');
    $routes->match(['get', 'post'], 'staff/new', 'Staff::create');
    $routes->match(['get', 'post'], 'staff/edit/(:num)', 'Staff::edit/$1');
    $routes->post('staff/delete/(:num)', 'Staff::delete/$1');

    $routes->match(['get', 'post'], 'sales/new', 'Sales::record');
    $routes->get('sales', 'Sales::index');
});
