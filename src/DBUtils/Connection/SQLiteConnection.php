<?php

declare(strict_types=1);

namespace AKUtils\DBUtils\Connection;

use AKUtils\DBUtils\Connection\ConnectionInterface;

class SQLiteConnection implements ConnectionInterface
{
    const DRIVER = "sqlite";
    const IN_MEMORY_DB = ":memory:";
    protected $connection;
    protected $databasePath;
    protected $username;
    protected $password;
    
    public function getConnection(): \PDO
    {
        if ($this->connection === null) {
            $database = $this->getDatabasePath();
            $driver = self::DRIVER;
            $dsn = "{$driver}:{$database}";
            $user = $this->getUsername();
            $pass = $this->getPassword();
            $options = [\PDO::ATTR_PERSISTENT => true];
            $pdo = new \PDO($dsn, $user, $pass, $options);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection = $pdo;
        }
        return $this->connection;
    }

    public function getInMemoryConnection(): \PDO
    {
        $driver = self::DRIVER;
        $database = self::IN_MEMORY_DB;
        $dsn = "{$driver}:{$database}";
        $this->connection = \PDO($dsn);
        return $this->connection;
    }

    public function setDatabasePath(string $path)
    {
        if (!file_exists($path)) {
            throw new \Exception("Database not found in path: {$path}");
        }

        $this->databasePath = $path;
        return $this;
    }

    protected function getDatabasePath(): string
    {
        return $this->databasePath;
    }

    public function useInMemoryDatabase()
    {
        $this->databasePath = self::IN_MEMORY_DB;
        return $this;
    }

    public function setUsername(string $user)
    {
        $this->username = $user;
        return $this;
    }

    protected function getUsername()
    {
        return $this->username;
    }

    public function setPassword(string $pass)
    {
        $this->password = $pass;
        return $this;
    }

    protected function getPassword()
    {
        return $this->password;
    }

}
