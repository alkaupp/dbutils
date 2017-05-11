<?php namespace AKUtils\DBUtils;

interface SQLStatementInterface
{
    public function getSqlStatement(): string;
    public function setTable(string $table);
    public function execute(): int;
}
