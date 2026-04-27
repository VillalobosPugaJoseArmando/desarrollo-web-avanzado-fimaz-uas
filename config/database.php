<?php
namespace config;

class Database {
    private string $host = "127.0.0.1";
    private string $dbname = "escuela";
    private string $username = "root";
    private string $password = "";
    private ?\PDO $connection = null;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->connection = new \PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \RuntimeException("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection(): \PDO {
        return $this->connection;
    }
}