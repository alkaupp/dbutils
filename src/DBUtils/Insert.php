<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

class Insert
{
    protected $connection;
    protected $table;
    protected $data;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
        return $this;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function into(string $table)
    {
        $this->setTable($table);
        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function values(array $data)
    {
        $this->setData($data);
        return $this;
    }

    public function getSQLStatement(): string
    {
        return $this->getInsertStatementSQL($this->data);
    }

    protected function getQuery(): string
    {
        $columns = array_keys($this->data);
        $stmt = $this->getInsertStatement($columns);
        return $stmt;
    }

    protected function prepareParameters(array $data): array
    {
        $params = [];
        foreach ($data as $key => $val) {
            $params[":{$key}"] = $val;
        }
        return $params;
    }

    protected function getInsertStatement(array $columns): string
    {
        $colString = implode(", ", array_keys($this->data));
        $paramString = implode(", ", array_map(function($key) {
            return ":" . $key;
        }, $columns));

        $query = "INSERT INTO {$this->table}({$colString}) VALUES({$paramString});";
        return $query;
    }

    protected function getInsertStatementSQL(array $data): string
    {
        $colString = implode(", ", array_keys($data));
        $paramString = implode(", ", array_map(function($value) {
            if (!is_int($value) && !is_float($value)) {
                return "'{$value}'";
            }
            return $value;
        }, $data));

        $query = "INSERT INTO {$this->table}($colString) VALUES({$paramString});";
        return $query;
    }
}
