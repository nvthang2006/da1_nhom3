<?php
require_once __DIR__ . '/app/Core/bootstrap.php';

use App\Core\Router;

$router = new Router();

// Auth
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/register', 'AuthController@showRegisterForm');
$router->post('/register', 'AuthController@register');

// Admin area
$router->get('/admin', 'Admin/DashboardController@index');
$router->get('/admin/tours', 'Admin/TourController@index');
$router->get('/admin/tours/create', 'Admin/TourController@create');
$router->post('/admin/tours/store', 'Admin/TourController@store');
$router->get('/admin/tours/edit', 'Admin/TourController@edit'); // ?id=
$router->post('/admin/tours/update', 'Admin/TourController@update');
$router->post('/admin/tours/delete', 'Admin/TourController@delete');

// Bookings (admin)
$router->get('/admin/dashboard', 'Admin/DashboardController@index');
$router->get('/admin/bookings', 'Admin/BookingController@index');
$router->post('/admin/bookings/store', 'Admin/BookingController@store');

// HDV area
$router->get('/hdv', 'Hdv/DashboardController@index');
$router->get('/hdv/checkin', 'Hdv/CheckinController@list');
$router->post('/hdv/checkin', 'Hdv/CheckinController@create');

// Public
$router->get('/', 'HomeController@index');
$router->get('/tours', 'HomeController@tours');
$router->get('/tours/show', 'HomeController@show'); // ?id=

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
