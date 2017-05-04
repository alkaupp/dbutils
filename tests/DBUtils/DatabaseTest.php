<?php

use PHPUnit\Framework\TestCase;
use AKUtils\DBUtils\Database;

class DatabaseTest extends TestCase
{
    /**
     * @expectedException AKUtils\DBUtils\UnknownDatabaseDriverException
     * @expectedExceptionMessage Unknown driver: foobar
     */
    public function testSetDriverThrowsExceptionWithUnknown()
    {
        $db = new Database();
        $db->setDriver("foobar");
    }
}
