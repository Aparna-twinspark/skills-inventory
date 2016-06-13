<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Skills',
    ['path' => '/skills'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
