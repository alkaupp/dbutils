<?php

namespace AKUtils\DBUtils\Connection;

interface ConnectionInterface
{
    public function getConnection(): \PDO;
}
