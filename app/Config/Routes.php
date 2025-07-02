<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ubah root URL menjadi ke halaman login atau dashboard
$routes->get('/', 'Auth::login');

// Auth routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Quiz routes
$routes->get('/quiz/(:num)', 'Quiz::index/$1');
$routes->post('/quiz/submit', 'Quiz::submit');
$routes->get('/result', 'Quiz::submit'); // hasil redirect

// Leaderboard
$routes->get('/leaderboard', 'Score::leaderboard');

// Nonaktifkan AutoRouting standar demi keamanan (disarankan CodeIgniter)
$routes->setAutoRoute(false);
