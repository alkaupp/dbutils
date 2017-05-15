<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Table;

class TableTest extends TestCase
{
    public function testGetSqlCreateStatement()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->addColumn("id", "INT", ["AUTO_INCREMENT", "PRIMARY KEY"])
            ->addColumn("first_name", "VARCHAR(255)", ["NOT NULL"])
            ->addColumn("last_name", "VARCHAR(255)", ["NOT NULL"])
            ->getSqlStatement(Table::CREATE);
        $expected = "CREATE TABLE `test` (`id` INT AUTO_INCREMENT PRIMARY KEY, `first_name` VARCHAR(255) NOT NULL, `last_name` VARCHAR(255) NOT NULL)";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetSqlCreateStatementWithForeignKeys()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->addColumn("id", "INT", ["AUTO_INCREMENT", "PRIMARY KEY"])
            ->addColumn("first_name", "VARCHAR(255)", ["NOT NULL"])
            ->addColumn("last_name", "VARCHAR(255)", ["NOT NULL"])
            ->addColumn("city_id", "INT", ["NOT NULL"])
            ->addForeignKey("city_id", "city", "id")
            ->getSqlStatement(Table::CREATE);
        $expected = "CREATE TABLE `test` (`id` INT AUTO_INCREMENT PRIMARY KEY, `first_name` VARCHAR(255) NOT NULL, `last_name` VARCHAR(255) NOT NULL, `city_id` INT NOT NULL) FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetUpdateSqlStatementAddColumn()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->addColumn("address", "VARCHAR(255)")
            ->getSqlStatement(Table::UPDATE);
        $expected = "ALTER TABLE `test` ADD COLUMN `address` VARCHAR(255)";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetUpdateSqlStatementModifyColumn()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->modifyColumn("address", "VARCHAR(255)")
            ->getSqlStatement(Table::UPDATE);
        $expected = "ALTER TABLE `test` MODIFY COLUMN `address` VARCHAR(255)";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetUpdateSqlStatementDropColumn()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->dropColumn("address", "VARCHAR(255)")
            ->getSqlStatement(Table::UPDATE);
        $expected = "ALTER TABLE `test` DROP COLUMN `address`";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetUpdateSqlStatementDropFK()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->dropForeignKey("fk_test_123")
            ->getSqlStatement(Table::UPDATE);
        $expected = "ALTER TABLE `test` DROP FOREIGN KEY `fk_test_123`";
        $this->assertEquals($expected, $stmt);
    }

    public function testGetUpdateSqlStatementDropTable()
    {
        $pdo = $this->createMock(\PDO::class);
        $table = new Table($pdo);
        $stmt = $table->setTable("test")
            ->getSqlStatement(Table::DROP);
        $expected = "DROP TABLE `test`";
        $this->assertEquals($expected, $stmt);
    }
}
