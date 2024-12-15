<?php
namespace App\Core;

class Router {
    private static $routes = [];

    public static function add($method, $route, $action) {
        self::$routes[] = compact('method', 'route', 'action');
    }

    public static function dispatch($method, $uri) {
        foreach (self::$routes as $route) {
            if ($method === $route['method'] && $uri === $route['route']) {
                return call_user_func($route['action']);
            }
        }
        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
    }
}