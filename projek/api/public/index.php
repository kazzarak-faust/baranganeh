<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtok($_SERVER["REQUEST_URI"], '?');

require __DIR__ . '/../routes/api.php';

Router::dispatch($method, $uri);