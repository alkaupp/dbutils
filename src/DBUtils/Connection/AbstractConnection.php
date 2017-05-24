<?php

declare(strict_types=1);

namespace DBUtils\Connection;

abstract class AbstractConnection
{
    protected $hostname;
    protected $port;
    protected $username;
    protected $password;
    protected $dbname;
    protected $driver;

    abstract public function getConnection(): \PDO;
    abstract protected function getDSN(): string;

    public function setHostname(string $hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    protected function getHostname()
    {
        return $this->hostname;
    }

    public function setPort(int $port)
    {
        $this->port = $port;
        return $this;
    }

    protected function getPort()
    {
        return $this->port;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    protected function getUsername()
    {
        return $this->username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    protected function getPassword()
    {
        return $this->password;
    }

    public function setDatabaseName(string $dbname)
    {
        $this->dbname = $dbname;
        return $this;
    }

    protected function getDatabaseName()
    {
        return $this->dbname;
    }

    public function setDriver(string $driver)
    {
        $this->driver = $driver;
        return $this;
    }

    protected function getDriver()
    {
        return $this->driver;
    }
}

