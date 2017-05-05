<?php namespace AKUtils\DBUtils;

interface DatabaseInterface
{
    public function getConnection(): \PDO;
    public function setHostname(string $hostname);
    public function setUsername(string $username);
    public function setPassword(string $password);
    public function setDatabaseName(string $dbname);
}
