<?php namespace DBUtils;

use DBUtils\Statement\Delete;
use DBUtils\Statement\Insert;
use DBUtils\Statement\Replace;
use DBUtils\Statement\Update;
use PDO;

interface DatabaseInterface
{
    public function insert(): Insert;
    public function delete(): Delete;
    public function replace(): Replace;
    public function update(string $table=null): Update;
    public function create(string $dbname);
    public function drop();
    public function getConnection(): PDO;
}
