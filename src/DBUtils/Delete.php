<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

use AKUtils\DBUtils\Statement;
use AKUtils\DBUtils\SQLStatementInterface;
use AKUtils\DBUtils\Filterable;
use AKUtils\DBUtils\Filter;

class Delete extends Statement implements SQLStatementInterface, Filterable
{
    protected $connection;
    protected $table;
    protected $filter;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Set table for query
     * @param string $table
     */
    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Set table for query, alternative for setTable()
     * @param string $table
     */
    public function from(string $table)
    {
        $this->setTable($table);
        return $this;
    }

    /**
     * Execute current query
     * @return int Affected rows
     */
    public function execute(): int
    {
        $stmt = $this->createQuery();
        $query = $this->connection->prepare($stmt);
        $filters = $this->filter->getFilters();
        $query->execute($filters);
        return $query->rowCount();
    }

    protected function createQuery(): string
    {
        $table = $this->getTable();
        $filter = $this->filter;
        if ($this->filter === null) {
            throw new \Exception("Update needs a filter!");
        }
        $filters = $filter->getQueryString();
        $query = $this->getQueryString($table, $filters);
        return $query;
    }

    public function getSqlStatement(): string
    {
        $table = $this->table;
        $filter = $this->filter;
        $filters = strtr($filter->getQueryString(), $filter->getFilters());
        return $this->getQueryString($table, $filters);
    }

    public function where(string $column, string $comparator, $value=null, $value2=null): Filter
    {
        $filter = new Filter($this);
        $filter->where($column, $comparator, $value, $value2);
        $this->filter = $filter;
        return $filter;
    }

    protected function getQueryString($table, $filters): string
    {
        $sqlString = "DELETE FROM {$table} {$filters}";
        return $sqlString;
    }
}
