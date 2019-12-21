<?php

use DBUtils\Connection\ConnectionException;
use PHPUnit\Framework\TestCase;
use DBUtils\Connection\MySQLConnection;

class MySQLConnectionTest extends TestCase
{
    public function testGetConnectionExceptionNoHostnameSet(): void
    {
        $this->expectException(ConnectionException::class);
        $con = new MySQLConnection();
        $con->getConnection();
    }

    public function testGetConnectionExceptionNoUsernameSe(): void
    {
        $this->expectException(ConnectionException::class);
        $con = new MySQLConnection();
        $con->setHostName('localhost');
        $con->getConnection();
    }

    public function testGetConnectionExceptionNoPasswordSet(): void
    {
        $this->expectException(ConnectionException::class);
        $con = new MySQLConnection();
        $con->setHostName('localhost')
            ->setUsername('foo');
        $con->getConnection();
    }
}
