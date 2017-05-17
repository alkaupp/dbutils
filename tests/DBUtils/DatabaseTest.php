<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Database;
use AKUtils\DBUtils\Filter;
use AKUtils\DBUtils\Connection\ConnectionInterface;

class DatabaseTest extends TestCase
{
    public function setUp()
    {
        $pdo = $this->createMock(PDO::class);
        $this->connection = $this->createMock(ConnectionInterface::class);
        $this->connection->method("getConnection")->willReturn($pdo);
    }

    public function testGetConnection()
    {
        $db = new Database($this->connection);
        $con = $db->getConnection();
        $this->assertInstanceOf(PDO::class, $con);
    }

    public function testInsert()
    {
        $db = new Database($this->connection);
        $actual = $db->insert()
            ->into("test")
            ->values(["id" => 3, "name" => "testman"])
            ->getSQLStatement();
        $expected = "INSERT INTO test(id, name) VALUES(3, 'testman');";
        $this->assertEquals($expected, $actual);
    }

    public function testReplace()
    {
        $db = new Database($this->connection);
        $actual = $db->replace()
            ->into("test")
            ->values(["id" => 3, "name" => "testman"])
            ->getSqlStatement();
        $expected = "REPLACE INTO test(id, name) VALUES(3, 'testman');";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate()
    {
        $db = new Database($this->connection);
        $actual = $db->update("test")
            ->set(["foo" => "bar"])
            ->where("id", Filter::EQUALS, 45)
            ->getSqlStatement();
        $expected = "UPDATE test SET foo='bar' WHERE id = 45";
        $this->assertEquals($expected, $actual);
    }
}
