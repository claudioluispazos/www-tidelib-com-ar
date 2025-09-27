<?php

use Illuminate\Http\Request;

// Manejo de solicitudes OPTIONS y CORS solo para /docs o /docs?api-docs.json
if (isset($_SERVER['REQUEST_URI']) && preg_match('#^/docs(\?api-docs\.json)?$#', $_SERVER['REQUEST_URI'])) {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-CSRF-TOKEN');

    // Si es una solicitud OPTIONS, terminamos aquí
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }
}

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel y manejar la solicitud...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
