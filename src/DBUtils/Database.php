<?php

declare(strict_types=1);

namespace DBUtils;

use DBUtils\DatabaseInterface;
use DBUtils\UnknownDatabaseDriverException;
use DBUtils\Insert;
use DBUtils\Replace;
use DBUtils\Delete;
use DBUtils\Update;
use DBUtils\Table;
use DBUtils\Connection\ConnectionInterface;
use DBUtils\Charset;
use DBUtils\CharsetException;
use DBUtils\Collation;
use DBUtils\CollationException;

class Database implements DatabaseInterface
{
    protected $connection;
    protected $characterSet;
    protected $collation;

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
        if (!in_array($charset, Charset::LIST)) {
            throw new CharsetException("Unknown charset: {$charset}");
        }
        $this->characterSet = $charset;
        return $this;
    }

    protected function getCharacterSet(): string
    {
        if ($this->characterSet === null) {
            $this->characterSet = Charset::UTF8;
        }
        return $this->characterSet;
    }

    public function setCollation(string $collation)
    {
        if (!in_array($collation, Collation::LIST)) {
            throw new CollationException("Unknown collation: {$collation}");
        }
        $this->collation = $collation;
        return $this;
    }

    protected function getCollation(): string
    {
        if ($this->collation === null) {
            $this->collation = Collation::UTF8_GENERAL_CI;
        }
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
