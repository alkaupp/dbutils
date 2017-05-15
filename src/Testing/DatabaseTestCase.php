<?php

use PHPUnit\Framework\TestCase;

abstract class DatabaseTestCase extends TestCase
{
    protected $connection;
    protected $pdo;

    final public function getConnection()
    {
        if ($this->connection === null) {
            if ($this->pdo === null) {
                $this->pdo = new \PDO(
                    $GLOBALS["DB_DSN"],
                    $GLOBALS["DB_USER"],
                    $GLOBALS["DB_PASSWD"]
                );
            }
            $this->connection = $this->createDefaultDBConnection(
                $this->pdo,
                $GLOBALS["DB_DBNAME"]
            );
        }
        return $this->connection;
    }
}
