<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Delete;
use AKUtils\DBUtils\Filter;

class DeleteTest extends TestCase
{
    public function testGetSqlStatement()
    {
        $pdo = $this->createMock(PDO::class);
        $delete = new Delete($pdo);
        $delete->from("test")
            ->where("id", Filter::EQUALS, 666);
        $actual = $delete->getSqlStatement();
        $expected = "DELETE FROM test WHERE id = 666";
        $this->assertEquals($expected, $actual);
    }
}
