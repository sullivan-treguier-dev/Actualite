<?php
namespace classe;

use ArrayAccess;
use PDO;

class Bdd {

    protected static string $table;
    protected static string $model;

    private static function connect(): PDO {
        $host = '127.0.0.1';
        $db = 'actualite';
        $user = $_SESSION['user'];
        $pass = $_SESSION['password'];
        $port = '3306';
        $charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        $pdo = new PDO($dsn, $user, $pass, $options);

        return $pdo;
    }

    public static function all(): array {
        $all_table = self::connect()->query("SELECT * FROM " . static::$table)->fetchAll();
        return $all_table;
    }

    public static function find(int $id): array {
        $find_id_table = self::connect()->query("SELECT * FROM " . static::$table . " WHERE id = {$id}")->fetch();
        return $find_id_table;
    }

    public static function limit(int $number): array {
        $limit_table = self::connect()->query("SELECT * FROM " . static::$table . " LIMIT {$number}")->fetchAll();
        return $limit_table;
    }

    public static function count(): int {
        $count_table = self::connect()->query("SELECT count(*) as count FROM " . static::$table)->fetchAll();
        return $count_table[0]['count'];
    }
}