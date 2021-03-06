<?php

use PHPUnit\Framework\TestCase;
use DBUtils\Statement\Update;
use DBUtils\Filter;

class UpdateTest extends TestCase
{
    public function testConstruct(): void
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $this->assertInstanceOf(Update::class, $update);
    }

    public function testGetSQLStatement(): void
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->set(["foo" => "bar"])
            ->where("id", Filter::EQUALS, 3)
            ->getSqlStatement();
        $expected = "UPDATE `table` SET `foo`='bar' WHERE `id` = 3";
        $this->assertEquals($expected, $actual);
    }

    public function testGetSQLStatementUpdateTwoValues(): void
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->set(["foo" => "bar", "bar" => "baz"])
            ->where("id", Filter::EQUALS, 3)
            ->getSqlStatement();
        $expected = "UPDATE `table` SET `foo`='bar', `bar`='baz' WHERE `id` = 3";
        $this->assertEquals($expected, $actual);
    }

    public function testGetSQLStatementUpdateTwoValuesWithTwoFilters(): void
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $actual = $update->setTable("table")
            ->set(["foo" => "bar", "bar" => "baz"])
            ->where("animal", Filter::EQUALS, "cow")->and()->where("animal", Filter::EQUALS, "horse")
            ->getSqlStatement();
        $expected = "UPDATE `table` SET `foo`='bar', `bar`='baz' WHERE `animal` = 'cow' AND `animal` = 'horse'";
        $this->assertEquals($expected, $actual);
    }
}

