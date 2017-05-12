<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\SQLStatementInterface;
use AKUtils\DBUtils\Statement;
use AKUtils\DBUtils\Filter;
use AKUtils\DBUtils\Filterable;

class Update extends Statement implements SQLStatementInterface, Filterable
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

    public function set(array $data)
    {
        $this->setData($data);
        return $this;
    }

    protected function createQuery(): string
    {
        $table = $this->getTable();
        $data = $this->getData();
        $columns = $this->preparePlaceholders($data);
        $filter = $this->filter;
        if ($this->filter === null) {
            throw new \Exception("Update needs a filter!");
        }
        $filters = $filter->getQueryString();
        $query = $this->getQueryString($table, $columns, $filters);
        return $query;
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
        $stmt = $this->createQuery();
        $query = $this->connection->prepare($stmt);
        $filters = $this->filter->getFilters();
        $params = array_merge(
            $this->prepareParameters($data),
            $this->prepareParameters($filters)
        );
        $query->execute($params);
        return $query->rowCount();
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

    public function where(string $column, string $comparator, $value=null, $value2=null): Filter
    {
        $filter = new Filter($this);
        $filter->where($column, $comparator, $value, $value2);
        $this->filter = $filter;
        return $filter;
    }
}
