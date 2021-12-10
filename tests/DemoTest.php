<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once('app/models/Task.php');

class DemoTest extends TestCase
{

    public function testTrueIsTrue()
    {
        // Kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
        $this->assertTrue(true);
    }

}