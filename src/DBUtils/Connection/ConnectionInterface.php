<?php

namespace DBUtils\Connection;

interface ConnectionInterface
{
    public function getConnection(): \PDO;
}
