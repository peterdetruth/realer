<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
// $routes->get('/', 'Home::index');
$routes->get('testuser', 'TestUser::index');
$routes->get('testauth/login', 'TestAuth::login');
$routes->get('testauth/logout', 'TestAuth::logout');

$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('login', 'LoginController::index');
    $routes->post('login', 'LoginController::attempt');
    $routes->get('logout', 'LoginController::logout');
    $routes->get('register', 'RegisterController::index');
    $routes->post('register', 'RegisterController::create');
});

// This ensures only logged-in users can access /dashboard
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->get('admin', 'AdminController::index', ['filter' => 'auth:admin']);
$routes->get('staff', 'StaffController::index', ['filter' => 'auth:admin,staff']);

$routes->group('', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('admin', 'AdminController::index');
    $routes->post('admin/update/(:num)', 'AdminController::update/$1');
    $routes->get('admin/edit/(:num)', 'AdminController::editUserForm/$1');
    $routes->post('admin/edit/(:num)', 'AdminController::updateUser/$1');
    $routes->get('admin/delete/(:num)', 'AdminController::deleteUser/$1');
});

$routes->get('admin/create', 'AdminController::createUserForm');
$routes->post('admin/create', 'AdminController::createUser');

$routes->group('admin', function ($routes) {
    $routes->get('counties', 'Admin\CountyController::index');
    $routes->get('counties/create', 'Admin\CountyController::create');
    $routes->post('counties/store', 'Admin\CountyController::store');
    $routes->get('counties/edit/(:num)', 'Admin\CountyController::edit/$1');
    $routes->post('counties/update/(:num)', 'Admin\CountyController::update/$1');
    $routes->get('counties/delete/(:num)', 'Admin\CountyController::delete/$1');

    $routes->get('constituencies', 'Admin\ConstituencyController::index');
    $routes->get('constituencies/create', 'Admin\ConstituencyController::create');
    $routes->post('constituencies/store', 'Admin\ConstituencyController::store');
    $routes->get('constituencies/edit/(:num)', 'Admin\ConstituencyController::edit/$1');
    $routes->post('constituencies/update/(:num)', 'Admin\ConstituencyController::update/$1');
    $routes->get('constituencies/delete/(:num)', 'Admin\ConstituencyController::delete/$1');

    $routes->get('wards', 'Admin\WardController::index');
    $routes->get('wards/create', 'Admin\WardController::create');
    $routes->post('wards/store', 'Admin\WardController::store');
    $routes->get('wards/edit/(:num)', 'Admin\WardController::edit/$1');
    $routes->post('wards/update/(:num)', 'Admin\WardController::update/$1');
    $routes->get('wards/delete/(:num)', 'Admin\WardController::delete/$1');
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('', 'Admin\UserController::index'); // Admin Panel (current landing)
    $routes->get('dashboard', 'Admin\DashboardController::index'); // New Dashboard
    $routes->get('counties', 'Admin\CountyController::index');
    $routes->get('constituencies', 'Admin\ConstituencyController::index');
    $routes->get('wards', 'Admin\WardController::index');
});

// Admin Positions
$routes->group('admin/positions', ['filter' => 'admin'], function ($routes) {

    // Index page → list all positions
    $routes->get('', 'Admin\PositionController::index');

    // Create → show form
    $routes->get('create', 'Admin\PositionController::create');

    // Store → handle form submission
    $routes->post('store', 'Admin\PositionController::store');

    // Edit → show edit form
    $routes->get('edit/(:num)', 'Admin\PositionController::edit/$1');

    // Update → handle edit submission
    $routes->post('update/(:num)', 'Admin\PositionController::update/$1');

    // Delete → remove position
    $routes->get('delete/(:num)', 'Admin\PositionController::delete/$1');
});


$routes->group('ajax', function ($routes) {
    $routes->get('constituencies/(:num)', 'Ajax\LocationController::getConstituencies/$1');
    $routes->get('wards/(:num)', 'Ajax\LocationController::getWards/$1');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'UserProfileController::index');
    $routes->post('profile/store', 'UserProfileController::store');
});

$routes->get('profile/step3', function () {
    return 'Step 3 coming soon...';
});
