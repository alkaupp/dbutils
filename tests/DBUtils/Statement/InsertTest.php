<?php

use PHPUnit\Framework\TestCase;
use DBUtils\Statement\Insert;

class InsertTest extends TestCase
{
    public function testConstruct()
    {
        $pdo = $this->createMock(PDO::class);
        $insert = new Insert($pdo);
        $this->assertInstanceOf(Insert::class, $insert);
    }

    public function testGetSQLStatement()
    {
        $pdo = $this->createMock(PDO::class);
        $insert = new Insert($pdo);
        $insert->into("test")->values(["id" => 3, "name" => "Testman"]);
        $expected = "INSERT INTO `test` (`id`, `name`) VALUES(3, 'Testman');";
        $this->assertEquals($expected, $insert->getSqlStatement());
    }
}
