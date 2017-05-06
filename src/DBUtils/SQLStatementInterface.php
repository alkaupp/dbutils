<?php namespace AKUtils\DBUtils;

interface SQLStatementInterface
{
    public function getSQLStatement(): string;
    public function setTable(string $table);
    public function execute(): int;
}
