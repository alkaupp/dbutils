<?php namespace AKUtils\DBUtils;

interface DatabaseInterface
{
    public function insert();
    public function delete();
    public function replace();
    public function update();
    public function create(string $dbname);
    public function drop();
}
