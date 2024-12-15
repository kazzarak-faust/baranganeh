<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    public static function index() {
        echo json_encode(User::all());
    }

    public static function login() {
        $data = json_decode(file_get_contents("php://input"), true);
        $user = User::findByUsernameAndPassword($data['username'], $data['password']);
        if ($user) {
            echo json_encode(['success' => true, 'user' => $user]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }

    public static function register() {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = User::create($data);
        echo json_encode(['success' => $result]);
    }
}