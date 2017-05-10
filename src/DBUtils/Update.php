<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\SQLStatementInterface;
use AKUtils\DBUtils\Statement;
use AKUtils\DBUtils\Filter;

class Update extends Statement implements SQLStatementInterface
{
    protected $connection;
    protected $data;
    protected $filter;

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
        $table = $this->getTable();
    }

    public function getSqlStatement(): string
    {
        $table = $this->getTable();
        $data = $this->getData();
        $params = $this->prepareParameters($data);
        $columns = strtr($this->preparePlaceholders($data), $params);
        $filter = $this->filter;
        if ($this->filter === null) {
            throw new \Exception("Update needs a filter!");
        }
        $filters = strtr($filter->getQueryString(), $filter->getFilters());
        $query = $this->getQueryString($table, $columns, $filters);
        return $query;
    }

    public function execute(): int
    {

    }

    protected function getQueryString(string $table, string $columns, string $filters): string
    {
        return "UPDATE {$table} SET {$columns} {$filters}";
    }

    protected function preparePlaceholders(array $data): string
    {
        $placeholders = [];
        foreach ($data as $column => $value) {
            if (is_string($value)) {
                $placeholders[] = "{$column}=':{$column}'";
            } else {
                $placeholders[] = "{$column}=:{$column}";
            }
        }
        $placeholderString = implode(", ", $placeholders);
        return $placeholderString;
    }

    public function filter(): Filter
    {
        $filter = new Filter($this);
        $this->filter = $filter;
        return $filter;
    }
}
