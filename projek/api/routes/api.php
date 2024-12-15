<?php

use App\Controllers\UserController;
use App\Controllers\KonspirasiController;
use App\Controllers\BeritaController;
use App\Core\Router;

Router::add('GET', '/users', [UserController::class, 'index']);
Router::add('POST', '/users/login', [UserController::class, 'login']);
Router::add('POST', '/users/register', [UserController::class, 'register']);

Router::add('GET', '/konspirasi', [KonspirasiController::class, 'index']);
Router::add('POST', '/konspirasi', [KonspirasiController::class, 'store']);

Router::add('GET', '/berita', [BeritaController::class, 'index']);
Router::add('POST', '/berita', [BeritaController::class, 'store']);
