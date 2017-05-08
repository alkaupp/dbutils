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
    protected $sqlString;
    protected $values = 0;
    protected $betweenA = 0;
    protected $betweenB = 1;

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getSqlString(): string
    {
        return $this->sqlString;
    }

    /**
     * @param string $column Column
     * @param string $comparator Comparison operator, see constants
     * @param mixed $value Value or values to compare to
     * @param mixed $value2 Optional value for eg. date BETWEEN
     */
    public function where(string $column, string $comparator, $value, $value2=null)
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
            break;
        case self::NOT_NULL:
            $filter .= "IS NOT NULL";
            break;
        case self::BETWEEN:
            $between = $this->between($value, $value2);
            $this->placeholderString = $filter . $between["placeholder"];
            $this->sqlString = $filter . $between["sql"];
            return $this;
        case self::IN:
            $in = $this->in($value);
            $this->placeholderString = $filter . $in["placeholder"];
            $this->sqlString = $filter . $in["sql"];
            return $this;
        }
        $filterValue = is_string($value) ? "'{$value}'" : $value;
        $filter .= $filterValue;
        $this->placeholderString = $filter;
        $this->sqlString = $filter;
        return $this;
    }

    protected function between($value, $value2): array
    {
        $betweenA = ":between{$this->betweenA}";
        $betweenB = ":between{$this->betweenB}";
        $filter = [
            "placeholder" => "BETWEEN {$betweenA} AND {$betweenB}",
            "sql" => "BETWEEN {$value} AND {$value2}"
        ];
        $betweenFilters = [
            $betweenA => $value,
            $betweenB => $value2
        ];
        $filters = array_merge($this->filters, $betweenFilters);
        $this->filters = $filters;
        $this->betweenA += 2;
        $this->betweenB += 2;
        return $filter;
    }

    protected function in(array $values): array
    {
        $valueFilters = [];
        foreach ($values as $value) {
            $valueFilters["value{$this->value}"] = $value;
            $this->value += 1;
        }
        $filters = array_merge($this->filters, $valueFilters);
        $this->filters = $filters;
        $valuePlaceholders = implode(", ", array_keys($valueFilters));
        $valueSql = implode(", ", array_map(function($value) {
            if (is_string($value)) {
                return "'{$value}'";
            }
            return $value;
        }, array_values($valueFilters)));
        $filter = [
            "placeholder" => "IN({$valuePlaceholders})",
            "sql" => "IN($valuSql)"
        ];
        return $filter;
    }
}

