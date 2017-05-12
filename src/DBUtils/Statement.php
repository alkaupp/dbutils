<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

abstract class Statement
{
    protected $table;

    /**
     * Set table for query
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    protected function getTable(): string
    {
        return $this->table;
    }
 
    /**
     * Create query string for PDO-object. This query uses placeholder values
     * for parameters.
     * @return string Query string that will be prepared
     */
    abstract protected function createQuery(): string;

    /**
     * Return a key/value array with values and corresponding placeholders for
     * columns.
     * @param array $data column/value array
     * @return array placeholder/value array
     */
    protected function prepareParameters(array $data): array
    {
        $params = [];
        foreach ($data as $key => $val) {
            $params[":{$key}"] = $val;
        }
        return $params;
    }

    protected function getPlaceholdersForColumns(array $columns): string
    {
        $placeholders = implode(", ", array_map(function($key) {
        if (is_string($column)) {
            return "':{$column}'";
        }
            return ":{$column}";
        }, $columns));
        return $placeholders;
    }

    protected function getPlaceholderForColumn($column): string
    {
        if (is_string($column)) {
            return "':{$column}'";
        }
        return ":{$column}";
    }

    protected function valuesToString(array $values): string
    {
        $valuesString = implode(", ", array_map(function($value) {
            if (is_string($value)) {
                return "'{$value}'";
            }
            return $value;
        }, $values));
        return $valuesString;
    }

    protected function getValues(array $data): array
    {
        return array_values($data);
    }

    protected function getColumns(array $data): array
    {
        return array_keys($data);
    }

    protected function columnsToString(array $columns): string
    {
        return implode(", ", $columns);
    }
}

