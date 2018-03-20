<?php

declare(strict_types=1);

namespace DBUtils\Statement;

class Replace extends Insert
{
    public function __construct(\PDO $connection)
    {
        parent::__construct($connection);
        return $this;
    }

    protected function getQueryString(string $table, string $columns, string $params): string
    {
        return "REPLACE INTO `{$table}` ($columns) VALUES({$params});";
    }
}

