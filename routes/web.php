<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('steps', new Route(constant('URL_SUBFOLDER').'/dominaTest/steps/{id}', [ 
    'controller' => 'ArraysController', 
    'method' => 'steps' 
], [
    'number' => '[1-5]+'
]));

$routes->add('firstStep', new Route(constant('URL_SUBFOLDER').'/dominaTest/firstStep', [
    'controller' => 'ArraysController',
    'method' => 'firstStep'
]));

$routes->add('secondStep', new Route(constant('URL_SUBFOLDER').'/dominaTest/secondStep', [
    'controller' => 'ArraysController',
    'method' => 'secondStep'
]));

$routes->add('thirdStep', new Route(constant('URL_SUBFOLDER').'dominaTest/thirdStep', [
    'controller' => 'ArraysController',
    'method' => 'thirdStep'
]));

$routes->add('fourthStep', new Route(constant('URL_SUBFOLDER').'dominaTest/fourthStep', [
    'controller' => 'ArraysController',
    'method' => 'fourthStep'
]));

$routes->add('fifthStep', new Route(constant('URL_SUBFOLDER').'dominaTest/fifthStep', [
    'controller' => 'ArraysController',
    'method' => 'fifthStep'
]));