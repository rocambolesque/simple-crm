<?php

require_once(__DIR__.'/../vendor/autoload.php');

// define routes
$routes = array(
    '/\/companies$/' => array(
        'controller' => 'CompanyController',
        'method' => 'getAll',
    ),
    '/\/companies\/(?P<id>\d+)$/' => array(
        'controller' => 'CompanyController',
        'method' => 'get',
    ),
    '/\/companies\/(?P<id>\d+)\/edit/' => array(
        'controller' => 'CompanyController',
        'method' => 'update',
    ),
    '/\/companies\/(?P<id>\d+)\/persons$/' => array(
        'controller' => 'PersonController',
        'method' => 'getFromCompany',
    ),
    '/\/companies\/search$/' => array(
        'controller' => 'CompanyController',
        'method' => 'search',
    ),
    '/\/persons\/(?P<id>\d+)$/' => array(
        'controller' => 'PersonController',
        'method' => 'get',
    ),
    '/\/persons\/(?P<id>\d+)\/edit/' => array(
        'controller' => 'PersonController',
        'method' => 'update',
    ),
    '/\/persons\/search$/' => array(
        'controller' => 'PersonController',
        'method' => 'search',
    ),
    '/\/gender\/create$/' => array(
        'controller' => 'GenderController',
        'method' => 'create',
    ),
);

require(__DIR__.'/../views/header.php');

// routing
$routeFound = false;
foreach ($routes as $route => $resource) {
    if (preg_match($route, $_SERVER['REQUEST_URI'], $matches) === 1) {
        $controllerName = 'MeilleursAgents\Controller\\'.$resource['controller'];
        $controller = new $controllerName();

        $method = $resource['method'];
        $parameters = $matches;

        $controller->$method($parameters, $_REQUEST);
        $routeFound = true;
    }
}

// default to homepage
if (!$routeFound) {
    require(__DIR__.'/../views/home.php');
}
