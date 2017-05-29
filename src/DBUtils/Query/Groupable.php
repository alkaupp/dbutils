<?php namespace DBUtils\Query;

interface Groupable
{
    public function groupBy(string ...$columns);
}
