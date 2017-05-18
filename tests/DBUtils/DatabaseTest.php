<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Database;
use AKUtils\DBUtils\Filter;
use AKUtils\DBUtils\Connection\ConnectionInterface;
use AKUtils\DBUtils\Connection\SQLiteConnection;

class DatabaseTest extends TestCase
{
    protected static $sqliteCon;

    public static function setUpBeforeClass()
    {
        $con = new SQLiteConnection();
        $con->useInMemoryDatabase();
        $db = new Database($con);
        $db->table()
            ->setTable("test")
            ->addColumn("id", "integer", ["primary key"])
            ->addColumn("name", "text")
            ->create();
        self::$sqliteCon = $con;
    }

    public static function tearDownAfterClass()
    {
        self::$sqliteCon = null;
    }

    public function setUp()
    {
        $pdo = $this->createMock(PDO::class);
        $this->connection = $this->createMock(ConnectionInterface::class);
        $this->connection->method("getConnection")->willReturn($pdo);
    }

    public function tearDown()
    {
        $db = new Database(self::$sqliteCon);
        $db->delete()
            ->from("test")
            ->where("id", Filter::GREATER_THAN, 0)
            ->execute();
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

    public function testInsertExecute()
    {
        $db = new Database(self::$sqliteCon);
        $query = $db->insert()
            ->into("test")
            ->values(["name" => "Test User"])
            ->execute();
        $this->assertEquals(1, $query, "Rowcount mismatch");
    }
}
