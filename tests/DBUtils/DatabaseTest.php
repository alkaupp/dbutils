<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Database;

class DatabaseTest extends TestCase
{
    /**
     * @expectedException AKUtils\DBUtils\UnknownDatabaseDriverException
     * @expectedExceptionMessage Unknown driver: foobar
     */
    public function testSetDriverThrowsExceptionWithUnknown()
    {
        $db = new Database();
        $db->setDriver("foobar");
    }

    public function testGetConnection()
    {
        $db = new Database();
        $db->setDriver("sqlite")
            ->setHostname(":memory:");
        $con = $db->getConnection();
        $this->assertInstanceOf(PDO::class, $con);
    }
}
