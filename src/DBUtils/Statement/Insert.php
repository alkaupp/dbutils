<?php

declare(strict_types=1);

namespace DBUtils\Statement;

use DBUtils\Statement\SQLStatementInterface;
use DBUtils\Statement\Statement;

class Insert extends Statement implements SQLStatementInterface
{
    protected $connection;
    protected $data;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
        return $this;
    }

    public function execute(): int
    {
        $stmt = $this->createQuery();
        $query = $this->connection->prepare($stmt);
        $params = $this->prepareParameters($this->getData());
        $query->execute($params);
        return $query->rowCount();
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

    protected function createQuery(): string
    {
        $columns = array_map(
            function($column) {
                return "`{$column}`";
            },
            array_keys($this->getData())
        );
        $colString = implode(", ", $columns);
        $placeholders = $this->getPlaceholdersForColumns($columns);
        $table = $this->getTable();
        $query = $this->getQueryString($table, $colString, $placeholders);
        return $query;
    }

    /**
     * Get SQL statement including actual parameters
     * @param array $data column/value pair arra
     * @return string SQL statement
     */
    public function getSqlStatement(): string
    {
        $data = $this->getData();
        $colString = $this->columnsToString($this->getColumns($data));
        $paramString = $this->valuesToString($this->getValues($data));
        $table = $this->getTable();
        $query = $this->getQueryString($table, $colString, $paramString);
        return $query;
    }

    protected function getQueryString(string $table, string $columns, string $params): string
    {
        return "INSERT INTO `{$table}` ($columns) VALUES({$params});";
    }
}
