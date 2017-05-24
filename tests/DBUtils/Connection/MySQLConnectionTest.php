<?php

use PHPUnit\Framework\TestCase;
use DBUtils\Connection\MySQLConnection;

class MySQLConnectionTest extends TestCase
{
    /**
     * @expectedException \DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoHostnameSet()
    {
        $con = new MySQLConnection();
        $con->getConnection();
    }

    /**
     * @expectedException \DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoUsernameSet()
    {
        $con = new MySQLConnection();
        $con->setHostName("localhost");
        $con->getConnection();
    }

    /**
     * @expectedException \DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoPasswordSet()
    {
        $con = new MySQLConnection();
        $con->setHostName("localhost")
            ->setUsername("foo");
        $con->getConnection();
    }
}
