<?php 
namespace application\model;

use PDO;
use PDOException;
use Exception;

class Model
{
    private static $sharedConnection = null; // فقط برای نگهداری یک اتصال مشترک
    protected $connection;

    public function __construct()
    {
        if (self::$sharedConnection === null) {
            global $dbHost, $dbName, $dbUsername, $dbPassword;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];

            try {
                self::$sharedConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword, $options);
            } catch (PDOException $e) {
                throw new Exception("Error connecting to the database: " . $e->getMessage());
            }
        }

        // به جای static مستقیم، اتصال رو در property معمولی قرار می‌دیم
        $this->connection = self::$sharedConnection;
    }

    public function __destruct()
    {
        $this->connection = null; // فقط برای آزادسازی اتصال در این شیء
    }

    protected function query(string $query, array $values = null)
    {
        try {
            if ($values === null) {
                return $this->connection->query($query);
            } else {
                $stmt = $this->connection->prepare($query);
                $stmt->execute($values);
                return $stmt;
            }
        } catch (PDOException $e) {
            throw new Exception("Query error: " . $e->getMessage());
        }
    }

    protected function execute(string $query, array $values = null): bool
    {
        try {
            if ($values === null) {
                return $this->connection->exec($query) !== false;
            } else {
                $stmt = $this->connection->prepare($query);
                return $stmt->execute($values);
            }
        } catch (PDOException $e) {
            throw new Exception("Execution error: " . $e->getMessage());
        }
    }

    protected function closeConnection()
    {
        $this->connection = null;
    }
}
