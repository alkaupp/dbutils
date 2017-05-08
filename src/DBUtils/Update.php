<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\SQLStatementInterface;
use AKUtils\DBUtils\Statement;

class Update extends Statement implements SQLStatementInterface
{
    protected $connection;
    protected $data;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
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

    protected function createQuery(): string
    {

    }

    public function getSQLStatement(): string
    {
        $table = $this->getTable();
        $data = $this->getData();
        $columnValuePairs = $this->getColumnValuePairs($data);
        $filters = $this->getFilters();
    }

    public function execute(): int
    {

    }

    protected function getQueryString(string $table, string $columns, string $filters): string
    {
        return "UPDATE {$table} SET {$columns} WHERE {$filters}";
    }

    protected function parseColumnValuePairs(array $data): array
    {
        $columnValuePairs = [];
        foreach ($data as $column => $value) {
            $columnValuePairs[] = "{$column}={$value}";
        }
        return $columnValuePairs;
    }
}
