<?php

namespace DBUtils\Connection;

use PDO;

interface ConnectionInterface
{
    public function getConnection(): PDO;
}
