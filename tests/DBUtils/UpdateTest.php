<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Update;

class UpdateTest extends TestCase
{
    public function testConstruct()
    {
        $pdo = $this->createMock(PDO::class);
        $update = new Update($pdo);
        $this->assertInstanceOf(Update::class, $update);
    }
}
