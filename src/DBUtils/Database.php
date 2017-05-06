<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\DatabaseInterface;
use AKUtils\DBUtils\UnknownDatabaseDriverException;
use AKUtils\DBUtils\Insert;
use AKUtils\DBUtils\Replace;

class Database implements DatabaseInterface
{
    const DRIVER_MYSQL = "mysql";
    const DRIVER_SQLITE = "sqlite";
    const DRIVER_POSTGRESQL = "pgsql";
    const DRIVERS = [
        self::DRIVER_MYSQL,
        self::DRIVER_SQLITE,
        self::DRIVER_POSTGRESQL
    ];
    protected $connection = "";
    protected $hostname = "";
    protected $username = "";
    protected $password = "";
    protected $dbname = "";
    protected $driver = "";

    public function getConnection(): \PDO
    {
        if (!$this->connection instanceof \PDO) {
            $dsn = $this->getDSNForDriver($this->getDriver());
            $user = $this->getUsername();
            $pass = $this->getPassword();
            $this->connection = new \PDO($dsn, $user, $pass);
        }
        return $this->connection;
    }

    public function insert(): Insert
    {
        $insert = new Insert($this->getConnection());
        return $insert;
    }

    public function replace(): Replace
    {
        $replace = new Replace($this->getConnection());
        return $replace;
    }

    public function setHostname(string $hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    protected function getHostname(): string
    {
        return $this->hostname;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    protected function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    public function setDatabaseName(string $dbname)
    {
        $this->dbname = $dbname;
        return $this;
    }

    protected function getDatabaseName(): string
    {
        return $this->dbname;
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

    protected function getDriver(): string
    {
        return $this->driver;
    }

    protected function getDSNForDriver(string $driver): string
    {
        $dsn = null;
        if ($driver === self::DRIVER_MYSQL||$driver === self::DRIVER_POSTGRESQL) {
            $driver = $this->getDriver();
            $host = $this->getHostname();
            $dbname = $this->getDatabaseName();
            $dsn = "{$driver}:{$host};{$dbname}";
        } elseif ($driver === self::DRIVER_SQLITE) {
            $driver = $this->getDriver();
            $dbname = $this->getDatabaseName();
            $dsn = "{$driver}:{$dbname}";
        }
        return $dsn;
    }
}
