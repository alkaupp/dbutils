<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

class Filter
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
    protected $placeholderString;
    protected $value = 0;
    protected $column = 0;
    protected $betweenA = 0;
    protected $betweenB = 1;

    public function __construct()
    {
        $this->filters = [];
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getSqlString(): string
    {
        $sqlString = strtr($this->placeholderString, $this->filters);
        return $sqlString;
    }

    public function getPlaceholderString(): string
    {
        return $this->placeholderString;
    }

    /**
     * @param string $column Column
     * @param string $comparator Comparison operator, see constants
     * @param mixed $value Value or values to compare to
     * @param mixed $value2 Optional value for eg. date BETWEEN
     */
    public function where(string $column, string $comparator, $value=null, $value2=null)
    {
        $filter = $this->placeholderString;
        if ($filter === null) {
            $filter = "WHERE ";
        }
        $filter .= "{$column} ";
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
            $this->placeholderString = $filter;
            return $this;
        case self::NOT_NULL:
            $filter .= "IS NOT NULL";
            $this->placeholderString = $filter;
            return $this;
        case self::BETWEEN:
            $between = $this->between($value, $value2);
            $this->placeholderString = $filter . $between;
            return $this;
        case self::IN:
            $in = $this->in($value);
            $this->placeholderString = $filter . $in;
            return $this;
        }
        $column = ":column{$this->column}";
        $this->column += 1;
        $filters = array_merge($this->filters, [$column => $value]);
        $this->filters = $filters;
        $placeholder = is_string($value) ? "'{$column}'" : "{$column}";
        $this->placeholderString = "{$filter}{$placeholder}";
        return $this;
    }

    public function and()
    {
        $this->placeholderString .= " AND ";
        return $this;
    }

    public function or()
    {
        $this->placeholderString .= " OR ";
        return $this;
    }

    protected function between($value, $value2): string
    {
        $betweenA = is_string($value) ? "':between{$this->betweenA}'" : ":between{$this->betweenA}";
        $betweenB = is_string($value2) ? "':between{$this->betweenB}'" : ":between{$this->betweenB}";
        $filter = "BETWEEN {$betweenA} AND {$betweenB}";
        $betweenFilters = [
            ":between{$this->betweenA}" => $value,
            ":between{$this->betweenB}" => $value2
        ];
        $filters = array_merge($this->filters, $betweenFilters);
        $this->filters = $filters;
        $this->betweenA += 2;
        $this->betweenB += 2;
        return $filter;
    }

    protected function in(array $values): string
    {
        $valueFilters = [];
        foreach ($values as $value) {
            $valueFilters[":value{$this->value}"] = $value;
            $this->value += 1;
        }
        $filters = array_merge($this->filters, $valueFilters);
        $this->filters = $filters;
        $valuePlaceholders = implode(", ", array_map(function($value) {
            if (is_string($value)) {
                return "'{$value}'";
            }
            return "{$value}";
        }, array_keys($valueFilters)));
        $filter = "IN({$valuePlaceholders})";
        return $filter;
    }
}

