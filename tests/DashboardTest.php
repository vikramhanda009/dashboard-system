<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DashboardTest extends KernelTestCase
{
    public function testAppBoots()
    {
        self::bootKernel();
        $this->assertTrue(true);
    }
    public function testDashboard()
    {
        $this->assertTrue(true);
    }
}