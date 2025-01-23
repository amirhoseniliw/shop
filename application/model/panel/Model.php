<?php

namespace application\model\panel;

use PDO;
use Exception;
use PDOException;

class Model  
{  
    protected $connection;  

    public function __construct()  
    {  
        global $dbHost, $dbName, $dbUsername, $dbPassword;  
        $options = [  
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"  
        ];  
        
        try {  
            $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword, $options);  
        } catch (PDOException $e) {  
            throw new Exception("Error connecting to the database: " . $e->getMessage());  
        }  
    }  

    public function __destruct()  
    {  
        $this->closeConnection();  
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
                return $this->connection->exec($query) !== false; // Return true or false based on exec success  
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
        $this->connection = null; // Closing the connection  
    }  
}  
