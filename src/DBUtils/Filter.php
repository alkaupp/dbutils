<?php

declare(strict_types=1);

namespace DBUtils;

use DBUtils\Statement\SQLStatementInterface;
use DBUtils\Filterable;

class Filter implements Filterable
{
    const EQUALS = "=";
    const NOT_EQUAL = "!=";
    const LESS_THAN = "<";
    const LESS_EQUAL = "<=";
    const GREATER_THAN = ">";
    const GREATER_EQUAL = ">=";
    const IS_NULL = "IS NULL";
    const NOT_NULL = "NOT NULL";
    const BETWEEN = "BETWEEN";
    const IN = "IN";

    protected $filters;
    protected $queryString;
    protected $value = 0;
    protected $statement;

    public function __construct(SQLStatementInterface $statement)
    {
        $this->statement = $statement;
        $this->filters = [];
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function getSqlStatement()
    {
        return $this->statement->getSqlStatement();
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getSqlString(): string
    {
        $filters = array_map(function($filter) {
            if (is_string($filter)) {
                return "'{$filter}'";
            }
            return $filter;
        }, $this->filters);
        return strtr($this->queryString, $filters);
    }

    public function getQueryString(): string
    {
        return $this->queryString;
    }

    /**
     * @param string $column Column
     * @param string $comparator Comparison operator, see constants
     * @param mixed $value Value or values to compare to
     * @param mixed $value2 Optional value for eg. date BETWEEN
     */
    public function where(string $column, string $comparator, $value=null, $value2=null): Filter
    {
        $filter = $this->queryString;
        if ($filter === null) {
            $filter = "WHERE ";
        }
        $filter .= "`{$column}` ";
        switch ($comparator) {
        case self::EQUALS:
            $filter .= "= ";
            break;
        case self::NOT_EQUAL:
            $filter .= "!= ";
            break;
        case self::LESS_THAN:
            $filter .= "< ";
            break;
        case self::LESS_EQUAL:
            $filter .= "<= ";
            break;
        case self::GREATER_THAN:
            $filter .= "> ";
            break;
        case self::GREATER_EQUAL:
            $filter .= ">= ";
            break;
        case self::IS_NULL:
            $filter .= "IS NULL";
            $this->queryString = $filter;
            return $this;
        case self::NOT_NULL:
            $filter .= "IS NOT NULL";
            $this->queryString = $filter;
            return $this;
        case self::BETWEEN:
            $between = $this->between($value, $value2);
            $this->queryString = $filter . $between;
            return $this;
        case self::IN:
            $in = $this->in($value);
            $this->queryString = $filter . $in;
            return $this;
        }
        $placeholder = $this->addFilter($value);
        $this->queryString = "{$filter}{$placeholder}";
        return $this;
    }

    public function and()
    {
        $this->queryString .= " AND ";
        return $this;
    }

    public function or()
    {
        $this->queryString .= " OR ";
        return $this;
    }

    protected function between($value, $value2): string
    {
        $placeholder1 = $this->addFilter($value);
        $placeholder2 = $this->addFilter($value2);
        $filter = "BETWEEN {$placeholder1} AND {$placeholder2}";
        return $filter;
    }

    protected function in(array $values): string
    {
        $placeholders = implode(", ", array_map(function($value) {
            $placeholder = $this->addFilter($value);
            return $placeholder;
        }, $values));
        $filter = "IN({$placeholders})";
        return $filter;
    }

    /**
     * @param mixed Value for filter
     * @return string Placeholder value
     */
    protected function addFilter($filter): string
    {
        $placeholder = ":value{$this->value}";
        $this->filters[$placeholder] = $filter;
        $this->value += 1;
        return $placeholder;
    }
}

