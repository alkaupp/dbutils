<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Connection\MySQLConnection;

class MySQLConnectionTest extends TestCase
{
    /**
     * @expectedException \AKUtils\DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoHostnameSet()
    {
        $con = new MySQLConnection();
        $con->getConnection();
    }

    /**
     * @expectedException \AKUtils\DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoUsernameSet()
    {
        $con = new MySQLConnection();
        $con->setHostName("localhost");
        $con->getConnection();
    }

    /**
     * @expectedException \AKUtils\DBUtils\Connection\ConnectionException
     */
    public function testGetConnectionExceptionNoPasswordSet()
    {
        $con = new MySQLConnection();
        $con->setHostName("localhost")
            ->setUsername("foo");
        $con->getConnection();
    }
}
