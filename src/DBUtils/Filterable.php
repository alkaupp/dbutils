<?php

namespace DBUtils;

use DBUtils\Filter;

interface Filterable
{

    public function where(string $column, string $comparator, $value=null, $value2=null): Filter;
}
