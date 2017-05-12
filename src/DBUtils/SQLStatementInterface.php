<?php namespace AKUtils\DBUtils;

interface SQLStatementInterface
{
    /**
     * Get SQL-statement used in current query
     * @return string
     */
    public function getSqlStatement(): string;

    /**
     * Set table for query
     * @param string $table
     */
    public function setTable(string $table);

    /**
     * Execute current query
     * @return int Affected rows
     */
    public function execute(): int;
}
