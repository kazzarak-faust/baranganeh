<?php
namespace App\Core;

use PDO;

class Database {
    private static $connection;

    public static function connect() {
        if (!self::$connection) {
            $config = require __DIR__ . '/../../config/database.php';
            self::$connection = new PDO(
                "mysql:host={$config['host']};baranganeh={$config['database']}",
                $config['root'],
                $config['']
            );
        }
        return self::$connection;
    }
}