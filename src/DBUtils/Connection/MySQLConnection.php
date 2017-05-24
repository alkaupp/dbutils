<?php

declare(strict_types=1);

namespace DBUtils\Connection;

use DBUtils\Connection\ConnectionInterface;
use DBUtils\Connection\AbstractConnection;
use DBUtils\Connection\ConnectionException;

class MySQLConnection extends AbstractConnection implements ConnectionInterface
{
    const DRIVER = "mysql";
    /** @var PDO $connection */
    protected $connection;

    public function __construct()
    {
        $this->setDriver(self::DRIVER);
    }

    public function getConnection(): \PDO
    {
        if ($this->connection === null) {
            $dsn = $this->getDSN();
            $username = $this->getUsername();
            if ($username === null) {
                throw new ConnectionException("Connection error: username missing");
            }
            $password = $this->getPassword();
            if ($password === null) {
                throw new ConnectionException("Connection error: password missing");
            }
            $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
            $this->connection = new \PDO($dsn, $username, $password, $options);
        }
        return $this->connection;
    }

    protected function getDSN(): string
    {
        $driver = $this->getDriver();
        $dsn = "{$driver}:";
        $hostname = $this->getHostname();
        if ($hostname === null) {
            throw new ConnectionException("Connection error: hostname missing");
        }
        $dsn .= "host={$hostname};";
        $port = $this->getPort();
        if ($port !== null) {
            $dsn .= "port={$port};";
        }
        $dbname = $this->getDatabaseName();
        if ($dbname !== null) {
            $dsn .= "dbname={$dbname}";
        }
        return $dsn;
    }
}
