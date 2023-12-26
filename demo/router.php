<?php

$uri = parse_url($_SERVER['REQUEST_URI']) ['path'];

// dd($uri);

// if ($uri === '/') {
//     require 'controllers/index.php';
// }
// else if ($uri === '/about') {
//     require 'controllers/about.php';
// }

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php'
];

function routeToControl($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    }
    else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code(404);
    require 'views/404.php'; 
    die();
}

routeToControl($uri, $routes);