<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->post('logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->match(['get', 'post'], 'tasks/new', 'Tasks::create');
    $routes->match(['get', 'post'], 'tasks/edit/(:num)', 'Tasks::edit/$1');
    $routes->post('tasks/delete/(:num)', 'Tasks::archive/$1');
});
