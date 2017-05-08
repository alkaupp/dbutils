<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Filter;

class FilterTest extends TestCase
{
    public function testSQLString()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::EQUALS, "foobar")
            ->getSqlString();
        $expected = "WHERE column = 'foobar'";
        $this->assertEquals($expected, $sqlString);
    }
}
