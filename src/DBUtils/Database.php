<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\DatabaseInterface;
use AKUtils\DBUtils\UnknownDatabaseDriverException;
use AKUtils\DBUtils\Insert;
use AKUtils\DBUtils\Replace;
use AKUtils\DBUtils\Delete;
use AKUtils\DBUtils\Update;
use AKUtils\DBUtils\Table;
use AKUtils\DBUtils\Connection\ConnectionInterface;
use AKUtils\DBUtils\Charset;

class Database implements DatabaseInterface
{
    protected $connection;
    protected $characterSet;
    protected $collation = "";

    public function __construct(ConnectionInterface $con)
    {
        $this->connection = $con;
    }

    /**
     * This shouldn't be public. But for sake of testability...
     */
    public function getConnection(): \PDO
    {
        return $this->connection->getConnection();
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

    public function update(string $table=null): Update
    {
        $update = new Update($this->getConnection());
        if ($table !== null) {
            $update->setTable($table);
        }
        return $update;
    }

    public function delete(): Delete
    {
        $delete = new Delete($this->getConnection());
        return $delete;
    }

    public function table(): Table
    {
        $table = new Table($this->getConnection());
        return $table;
    }

    public function setCharacterSet(string $charset)
    {
        $this->characterSet = $charset;
        return $this;
    }

    protected function getCharacterSet(): string
    {
        if ($this->characterSet === null) {
            return Charset::UTF8;
        }
        return $this->characterSet;
    }

    public function setCollation(string $collation)
    {
        $this->collation = $collation;
        return $this;
    }

    protected function getCollation(): string
    {
        return $this->collation;
    }

    public function create(string $dbname)
    {
        $charset = $this->getCharacterSet();
        $collation = $this->getCollation();
        $stmt = "CREATE DATABASE `{$dbname}` CHARACTER SET {$charset} COLLATE {$collation}";
        $conn = $this->getConnection();
        $query = $conn->prepare($stmt);
        $query->execute();
    }

    public function drop()
    {
        $dbname = $this->getDatabaseName();
        $stmt = "DROP DATABASE {$dbname}";
        $conn = $this->getConnection();
        $query = $conn->prepare($stmt);
        $query->execute();
    }
}
