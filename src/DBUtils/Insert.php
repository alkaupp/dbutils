<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\SQLStatementInterface;

class Insert implements SQLStatementInterface
{
    protected $connection;
    protected $table;
    protected $data;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
        return $this;
    }

    public function execute(): int
    {
        $stmt = $this->getQuery();
        $query = $this->connection->prepare($stmt);
        $params = $this->prepareParameters($this->getData());
        $query->execute($params);
        return $query->rowCount();
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    protected function getTable(): string
    {
        return $this->table;
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

    protected function getData(): array
    {
        return $this->data;
    }

    public function values(array $data)
    {
        $this->setData($data);
        return $this;
    }

    public function getSQLStatement(): string
    {
        return $this->getTrueSQLStatement($this->getData());
    }

    protected function getQuery(): string
    {
        $columns = array_keys($this->getData());
        $stmt = $this->getPlaceholderSQLStatement($columns);
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

    /**
     * Get SQL statement with parameter placeholders
     * @param array $data column/value pair arra
     * @return string SQL statement
     */
    protected function getPlaceholderSQLStatement(array $columns): string
    {
        $colString = implode(", ", array_keys($this->getData()));
        $paramString = implode(", ", array_map(function($key) {
            return ":" . $key;
        }, $columns));
        $table = $this->getTable();
        $query = $this->getQueryString($table, $colString, $paramString);
        return $query;
    }

    /**
     * Get SQL statement including actual parameters
     * @param array $data column/value pair arra
     * @return string SQL statement
     */
    protected function getTrueSQLStatement(array $data): string
    {
        $colString = implode(", ", array_keys($data));
        $paramString = implode(", ", array_map(function($value) {
            if (is_string($value)) {
                return "'{$value}'";
            }
            return $value;
        }, $data));
        $table = $this->getTable();
        $query = $this->getQueryString($table, $colString, $paramString);
        return $query;
    }

    protected function getQueryString(string $table, string $columns, string $params): string
    {
        return "INSERT INTO {$table}($columns) VALUES({$params});";
    }
}
