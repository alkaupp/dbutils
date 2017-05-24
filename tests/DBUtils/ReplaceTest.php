<?php

use PHPUnit\Framework\TestCase;
use DBUtils\Replace;

class ReplaceTest extends TestCase
{
    public function testConstruct()
    {
        $pdo = $this->createMock(PDO::class);
        $replace = new Replace($pdo);
        $this->assertInstanceOf(Replace::class, $replace);
    }

    public function testGetSQLStatement()
    {
        $pdo = $this->createMock(PDO::class);
        $replace = new Replace($pdo);
        $replace->into("test")->values(["id" => 3, "name" => "Testman"]);
        $expected = "REPLACE INTO test(id, name) VALUES(3, 'Testman');";
        $this->assertEquals($expected, $replace->getSqlStatement());
    }
}

