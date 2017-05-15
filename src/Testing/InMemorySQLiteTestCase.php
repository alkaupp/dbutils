<?php

use PHPUnit\Framework\TestCase;

abstract class InMemorySQLiteTestCase extends TestCase
{
    protected $connection;
    protected $pdo;

    final public function getConnection()
    {
        if ($this->connection === null) {
            if ($this->pdo === null) {
                $this->pdo = new \PDO(
                    "sqlite::memory"
                );
            }
            $this->connection = $this->createDefaultDBConnection(
                $this->pdo
            );
        }
        return $this->connection;
    }
}

