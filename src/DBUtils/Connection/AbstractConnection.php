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

    /**
     * Set hostname for connection, eg. localhost
     * @param string $hostname Ie. "localhost"
     * @return ConnectionInterface
     */
    public function setHostname(string $hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    protected function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set port for connection, eg. 3306
     * @param int $hostname Ie. 3306
     * @return ConnectionInterface
     */
    public function setPort(int $port)
    {
        $this->port = $port;
        return $this;
    }

    protected function getPort()
    {
        return $this->port;
    }

    /**
     * Set username for connection
     * @param string $username Username to your database server
     * @return ConnectionInterface
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    protected function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password for connection
     * @param string $password Password to your database server
     * @return ConnectionInterface
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    protected function getPassword()
    {
        return $this->password;
    }

    /**
     * Set database name for connection
     * @param string $dbname Database name in your database server
     * @return ConnectionInterface
     */
    public function setDatabaseName(string $dbname)
    {
        $this->dbname = $dbname;
        return $this;
    }

    protected function getDatabaseName()
    {
        return $this->dbname;
    }

    /**
     * Set a PDO driver for PDO-object
     *
     * This can be used in case you want to develop a connection object that is
     * not supported yet in this library. That could include a driver such as
     * DB2, Oracle or MSSQL. Check http://php.net/manual/en/pdo.drivers.php
     *
     * @param string $driver
     *
     */
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

