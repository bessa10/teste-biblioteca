<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('home/create', 'Home::create');
$routes->post('home/favorito', 'Home::update_favorito');
$routes->post('home/remover_livro', 'Home::remover_livro');
$routes->get('home/detalhes/(:num)', 'Home::detalhes/$1');
