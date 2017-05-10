<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Filter;
use AKUtils\DBUtils\SQLStatementInterface;

class FilterTest extends TestCase
{

    public function setUp()
    {
        $this->sqlStatement = $this->createMock(SQLStatementInterface::class);
    }

    public function testSQLStringFilterEquals()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::EQUALS, "foobar")
            ->getSqlString();
        $expected = "WHERE column = 'foobar'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterEquals()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::EQUALS, "foobar")
            ->getQueryString();
        $expected = "WHERE column = ':value0'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterNotEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::NOT_EQUAL, "foobar")
            ->getSqlString();
        $expected = "WHERE column != 'foobar'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterNotEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::NOT_EQUAL, "foobar")
            ->getQueryString();
        $expected = "WHERE column != ':value0'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterLessThan()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::LESS_THAN, 3)
            ->getSqlString();
        $expected = "WHERE column < 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterLessThan()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::LESS_THAN, 3)
            ->getQueryString();
        $expected = "WHERE column < :value0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterLessEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::LESS_EQUAL, 3)
            ->getSqlString();
        $expected = "WHERE column <= 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterLessEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::LESS_EQUAL, 3)
            ->getQueryString();
        $expected = "WHERE column <= :value0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterGreaterThan()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::GREATER_THAN, 3)
            ->getSqlString();
        $expected = "WHERE column > 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterGreaterThan()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::GREATER_THAN, 3)
            ->getQueryString();
        $expected = "WHERE column > :value0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterGreaterEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::GREATER_EQUAL, 3)
            ->getSqlString();
        $expected = "WHERE column >= 3";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterGreaterEqual()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::GREATER_EQUAL, 3)
            ->getQueryString();
        $expected = "WHERE column >= :value0";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIsNull()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::IS_NULL)
            ->getSqlString();
        $expected = "WHERE column IS NULL";
        $this->assertEquals($expected, $sqlString);

    }

    public function testQueryStringFilterIsNull()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::IS_NULL)
            ->getQueryString();
        $expected = "WHERE column IS NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIsNotNull()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::NOT_NULL)
            ->getSqlString();
        $expected = "WHERE column IS NOT NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterIsNotNull()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::NOT_NULL)
            ->getQueryString();
        $expected = "WHERE column IS NOT NULL";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterBetween()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("date", Filter::BETWEEN, "2017-04-12", "2017-05-12")
            ->getSqlString();
        $expected = "WHERE date BETWEEN '2017-04-12' AND '2017-05-12'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterBetween()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("date", Filter::BETWEEN, "2017-04-12", "2017-05-12")
            ->getQueryString();
        $expected = "WHERE date BETWEEN ':value0' AND ':value1'";
        $this->assertEquals(strlen($expected), strlen($sqlString));
        $this->assertEquals($expected, $sqlString);
    }

    public function testSQLStringFilterIn()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::IN, ["horse", "cow", "dog"])
            ->getSqlString();
        $expected = "WHERE column IN('horse', 'cow', 'dog')";
        $this->assertEquals($expected, $sqlString);
    }

    public function testQueryStringFilterIn()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("column", Filter::IN, ["horse", "cow", "dog"])
            ->getQueryString();
        $expected = "WHERE column IN(':value0', ':value1', ':value2')";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSqlStringOr()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("animal", FILTER::EQUALS, "horse")
            ->or()
            ->where("animal", FILTER::EQUALS, "cow")
            ->getSqlString();
        $expected = "WHERE animal = 'horse' OR animal = 'cow'";
        $this->assertEquals($expected, $sqlString);
    }

    public function testSqlStringAnd()
    {
        $filter = new Filter($this->sqlStatement);
        $sqlString = $filter->where("animal", FILTER::EQUALS, "horse")
            ->and()
            ->where("animal", FILTER::EQUALS, "cow")
            ->getSqlString();
        $expected = "WHERE animal = 'horse' AND animal = 'cow'";
        $this->assertEquals($expected, $sqlString);
    }
}
