<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Filter;

class FilterTest extends TestCase
{

    public function testSQLStringFilterEquals()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::EQUALS, "foobar")
            ->getSqlString();
        $expected = "WHERE column = 'foobar'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterEquals()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::EQUALS, "foobar")
            ->getPlaceholderString();
        $expected = "WHERE column = ':column0'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterNotEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::NOT_EQUAL, "foobar")
            ->getSqlString();
        $expected = "WHERE column != 'foobar'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterNotEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::NOT_EQUAL, "foobar")
            ->getPlaceholderString();
        $expected = "WHERE column != ':column0'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterLessThan()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::LESS_THAN, 3)
            ->getSqlString();
        $expected = "WHERE column < 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterLessThan()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::LESS_THAN, 3)
            ->getPlaceholderString();
        $expected = "WHERE column < :column0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterLessEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::LESS_EQUAL, 3)
            ->getSqlString();
        $expected = "WHERE column <= 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterLessEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::LESS_EQUAL, 3)
            ->getPlaceholderString();
        $expected = "WHERE column <= :column0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterGreaterThan()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::GREATER_THAN, 3)
            ->getSqlString();
        $expected = "WHERE column > 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterGreaterThan()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::GREATER_THAN, 3)
            ->getPlaceholderString();
        $expected = "WHERE column > :column0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterGreaterEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::GREATER_EQUAL, 3)
            ->getSqlString();
        $expected = "WHERE column >= 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterGreaterEqual()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::GREATER_EQUAL, 3)
            ->getPlaceholderString();
        $expected = "WHERE column >= :column0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIsNull()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::IS_NULL)
            ->getSqlString();
        $expected = "WHERE column IS NULL";
        $this->assertEquals($expected, $sqlString);

    }

    public function testPlaceholderStringFilterIsNull()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::IS_NULL)
            ->getPlaceholderString();
        $expected = "WHERE column IS NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIsNotNull()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::NOT_NULL)
            ->getSqlString();
        $expected = "WHERE column IS NOT NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterIsNotNull()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::NOT_NULL)
            ->getPlaceholderString();
        $expected = "WHERE column IS NOT NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterBetween()
    {
        $filter = new Filter();
        $sqlString = $filter->where("date", Filter::BETWEEN, "2017-04-12", "2017-05-12")
            ->getSqlString();
        $expected = "WHERE date BETWEEN '2017-04-12' AND '2017-05-12'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterBetween()
    {
        $filter = new Filter();
        $sqlString = $filter->where("date", Filter::BETWEEN, "2017-04-12", "2017-05-12")
            ->getPlaceholderString();
        $expected = "WHERE date BETWEEN ':between0' AND ':between1'";
        $this->assertEquals(strlen($expected), strlen($sqlString));
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIn()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::IN, ["horse", "cow", "dog"])
            ->getSqlString();
        $expected = "WHERE column IN('horse', 'cow', 'dog')";
        $this->assertEquals($expected, $sqlString);
    }

    public function testPlaceholderStringFilterIn()
    {
        $filter = new Filter();
        $sqlString = $filter->where("column", Filter::IN, ["horse", "cow", "dog"])
            ->getPlaceholderString();
        $expected = "WHERE column IN(':value0', ':value1', ':value2')";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSqlStringOr()
    {
        $filter = new Filter();
        $sqlString = $filter->where("animal", FILTER::EQUALS, "horse")
            ->or()
            ->where("animal", FILTER::EQUALS, "cow")
            ->getSqlString();
        $expected = "WHERE animal = 'horse' OR animal = 'cow'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSqlStringAnd()
    {
        $filter = new Filter();
        $sqlString = $filter->where("animal", FILTER::EQUALS, "horse")
            ->and()
            ->where("animal", FILTER::EQUALS, "cow")
            ->getSqlString();
        $expected = "WHERE animal = 'horse' AND animal = 'cow'";
        $this->assertEquals($expected, $sqlString);
    }
}
