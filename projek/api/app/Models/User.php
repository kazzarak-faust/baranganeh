<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class User {
    public static function all() {
        $stmt = Database::connect()->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByUsernameAndPassword($username, $password) {
        $stmt = Database::connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $stmt = Database::connect()->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$data['username'], $data['password']]);
    }
}