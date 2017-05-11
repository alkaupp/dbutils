<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Update;
use AKUtils\DBUtils\Filter;

class UpdateTest extends TestCase
{
    public function testConstruct()
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $this->assertInstanceOf(Update::class, $update);
    }

    public function testGetSQLStatement()
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->setData(["foo" => "bar"])
            ->filter()->where("id", Filter::EQUALS, 3)
            ->getSqlStatement();
        $expected = "UPDATE table SET foo='bar' WHERE id = 3";
        $this->assertEquals($expected, $actual);
    }

    public function testGetSQLStatementUpdateTwoValues()
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->setData(["foo" => "bar", "bar" => "baz"])
            ->filter()->where("id", Filter::EQUALS, 3)
            ->getSqlStatement();
        $expected = "UPDATE table SET foo='bar', bar='baz' WHERE id = 3";
        $this->assertEquals($expected, $actual);
    }

    public function testGetSQLStatementUpdateTwoValuesWithTwoFilters()
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->setData(["foo" => "bar", "bar" => "baz"])
            ->filter()->where("animal", Filter::EQUALS, "cow")->and()->where("animal", Filter::EQUALS, "horse")
            ->getSqlStatement();
        $expected = "UPDATE table SET foo='bar', bar='baz' WHERE animal = 'cow' AND animal = 'horse'";
        $this->assertEquals($expected, $actual);
    }
}

