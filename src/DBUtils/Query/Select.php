<?php

declare(strict_types=1);

namespace DBUtils\Query;

use DBUtils\Filterable;
use DBUtils\Query\Groupable;

class Select implements Filterable, Groupable
{
    public function columns(string ...$columns)
    {

    }

    public function from(string $table)
    {

    }

    public function where(string $column, string $comparator, $value=null, $value2=null): Filter
    {

    }

    public function groupBy(string ...$columns)
    {

    }
}
