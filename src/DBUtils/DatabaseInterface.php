<?php namespace AKUtils\DBUtils;

interface DatabaseInterface
{
    public function getConnection(): \PDO;
    public function setHostName(string $hostname);
    public function setUserName(string $username);
    public function setPassword(string $password);
    public function setDatabaseName(string $dbname);
}
