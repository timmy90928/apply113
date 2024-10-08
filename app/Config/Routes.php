<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->get('/home/sign_up_information', 'Home::sign_up_information');
$routes->get('/home/sign_up_school', 'Home::sign_up_school');
$routes->get('/home/sign_up_system_mainpage', 'Home::sign_up_system_mainpage');
$routes->get('/home/wishlist', 'Home::wishlist');
$routes->get('/home/personal_page', 'Home::personal_page');
$routes->setAutoRoute(true);