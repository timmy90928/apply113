<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->get('/home/sign_up_information', 'Home::sign_up_information');
$routes->setAutoRoute(true);