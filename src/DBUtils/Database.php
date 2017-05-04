<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\DatabaseInterface;
use AKUtils\DBUtils\UnknownDatabaseDriverException;

class Database implements DatabaseInterface
{
    const DRIVERS = ["pdo_mysql", "pdo_sqlite", "pdo_pgsql"];
    protected $connection;
    protected $hostname;
    protected $password;
    protected $dbname;
    protected $driver;

    public function getConnection(): \PDO
    {
        if (!$this->connection instanceof \PDO) {
            $dsn = "{$this->driver};host={$this->hostname};dbname={$this->dbname}";
            $user = $this->username;
            $pass = $this->password;
            $this->connection = new \PDO($dsn, $user, $pass);
        }
        return $this->connection;
    }

    public function setHostName(string $hostname)
    {

    }

    protected function getHostName(): string
    {

    }

    public function setUserName(string $username)
    {

    }

    protected function getUserName(): string
    {

    }

    public function setPassword(string $password)
    {

    }

    protected function getPassword(): string
    {

    }

    public function setDatabaseName(string $dbname)
    {

    }

    protected function getDatabaseName(): string
    {

    }

    public function setDriver(string $driver)
    {
        if (!in_array($driver, self::DRIVERS)) {
            $message = "Unknown driver: {$driver}";
            throw new UnknownDatabaseDriverException($message);
        }
        $this->driver = $driver;
        return $this;
    }
}
