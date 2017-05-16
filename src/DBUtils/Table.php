<?php

declare(strict_types=1);

namespace AKUtils\DBUtils;

class Table
{
    protected $connection;
    protected $table;
    protected $columns;
    protected $modifyColumns;
    protected $dropColumns;
    protected $foreignKeys;
    protected $dropForeignKeys;
    const CREATE = "CREATE";
    const UPDATE = "UPDATE";
    const DROP = "DROP";

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
        $this->columns = [];
        $this->modifyColumns = [];
        $this->dropColumns = [];
        $this->foreignKeys = [];
        $this->dropForeignKeys = [];
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function addColumn(string $name, string $type, array $attributes = null)
    {
        $column = "`{$name}` {$type}";
        if ($attributes !== null) {
            $attr = implode(" ", $attributes);
            $column .= " {$attr}";
        }
        $columns = array_merge($this->columns, [$column]);
        $this->columns = $columns;
        return $this;
    }

    public function modifyColumn(string $name, string $type, array $attributes = null)
    {
        $column = "MODIFY COLUMN `{$name}` {$type}";
        if ($attributes !== null) {
            $attr = implode(" ", $attributes);
            $column .= " {$attr}";
        }
        $columns = array_merge($this->modifyColumns, [$column]);
        $this->modifyColumns = $columns;
        return $this;
    }

    public function dropColumn(string $name)
    {
        $column = "DROP COLUMN `{$name}`";
        $this->dropColumns[] = $column;
        return $this;
    }

    public function addForeignKey(string $key, string $refTable, string $refColumn, array $attributes = null)
    {
        $foreignKey = "FOREIGN KEY (`{$key}`) REFERENCES `{$refTable}` (`{$refColumn}`)";
        if ($attributes !== null) {
            $attr = implode(" ", $attributes);
            $foreignKey .= " {$attr}";
        }
        $foreignKeys = array_merge($this->foreignKeys, [$foreignKey]);
        $this->foreignKeys = $foreignKeys;
        return $this;
    }

    public function dropForeignKey(string $constraint)
    {
        $foreignKey = "DROP FOREIGN KEY `{$constraint}`";
        $this->dropForeignKeys[] = $foreignKey;
        return $this;
    }

    public function create()
    {
        $stmt = $this->getSqlCreateStatement();
        return $this->execute($stmt);
    }

    public function update()
    {
        $stmt = $this->getSqlUpdateStatement();
        return $this->execute($stmt);
    }

    protected function execute(string $statement)
    {
        $query = $this->connection->prepare($statement);
        $query->execute();
    }

    public function getSqlStatement(string $method): string
    {
        if ($method === self::CREATE) {
            return $this->getSqlCreateStatement();
        } elseif ($method === self::UPDATE) {
            return $this->getSqlUpdateStatement();
        } elseif ($method === self::DROP) {
            return $this->getSqlDropStatement();
        }
        throw new \Exception("Unknown method: {$method}");
    }

    protected function getSqlCreateStatement(): string
    {
        $columns = implode(", ", $this->columns);
        $table = $this->table;
        $create = "CREATE TABLE `{$table}` ({$columns})";
        if (!empty($this->foreignKeys)) {
            $fks = implode (" ", $this->foreignKeys);
            $create .= " {$fks}";
        }
        return $create;
    }

    protected function getSqlUpdateStatement(): string
    {
        $table = $this->table;
        $alter = "ALTER TABLE `{$table}`";
        if (!empty($this->columns)) {
            $columns = implode(" ", array_map(function($col) {
                return " ADD COLUMN {$col}";
            }, $this->columns));
            $alter .= $columns;
        }
        if (!empty($this->modifyColumns)) {
            $columns = implode(" ", $this->modifyColumns);
            $alter .= " {$columns}";
        }
        if (!empty($this->dropColumns)) {
            $columns = implode(" ", $this->dropColumns);
            $alter .= " {$columns}";
        }
        if (!empty($this->foreignKeys)) {
            $fks = implode(" ", array_map(function($fk) {
                return " ADD {$fk}";
            }, $this->foreignKeys));
            $alter .= $fks;
        }
        if (!empty($this->dropForeignKeys)) {
            $fks = implode(" ", $this->dropForeignKeys);
            $alter .= " {$fks}";
        }
        return $alter;
    }

    protected function getSqlDropStatement(): string
    {
        $table = $this->table;
        $drop = "DROP TABLE `{$table}`";
        return $drop;
    }
}
