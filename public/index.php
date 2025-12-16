<?php

// 3 constantes pour définir les dossiers de notre projet
define('PROJECT_PATH', dirname(__DIR__));

const CONTROLLER_PATH = PROJECT_PATH . '/app/controllers';
const TEMPLATE_PATH = PROJECT_PATH . '/app/templates';
const CONFIG_PATH = PROJECT_PATH . '/config';

// Routage simple
$routes = require CONFIG_PATH . '/routes.php';

// Recherche du controller associé à la page demandée
$page = $_GET['page'] ?? 'home';

if (!isset($routes[$page])) {
    echo 'Page introuvable';
    http_response_code(404);
    die;
}

$controller = $routes[$page];

// Chargement du controller
require CONTROLLER_PATH . '/' . $controller;
