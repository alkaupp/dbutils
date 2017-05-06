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

    public function testInsert()
    {
        $db = new Database();
        $db->setDriver("sqlite")
            ->setHostname(":memory:");
        $actual = $db->insert()
            ->into("test")
            ->values(["id" => 3, "name" => "testman"])
            ->getSQLStatement();
        $expected = "INSERT INTO test(id, name) VALUES(3, 'testman');";
        $this->assertEquals($expected, $actual);
    }

    public function testReplace()
    {
        $db = new Database();
        $db->setDriver("sqlite")
            ->setHostname(":memory:");
        $actual = $db->replace()
            ->into("test")
            ->values(["id" => 3, "name" => "testman"])
            ->getSQLStatement();
        $expected = "REPLACE INTO test(id, name) VALUES(3, 'testman');";
        $this->assertEquals($expected, $actual);
    }
}
