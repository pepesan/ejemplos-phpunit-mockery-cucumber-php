<?php

namespace unit;

use Calculator;
use PHPUnit\Framework\TestCase;

require_once 'src/Calculator.php';

class SetupTest extends TestCase
{
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $result = $this->calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testSubtract()
    {
        $result = $this->calculator->subtract(5, 3);
        $this->assertEquals(2, $result);
    }

    public function testDivideByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division by zero");

        $this->calculator->divide(10, 0);
    }

    public function testDivide()
    {
        $result = $this->calculator->divide(6, 3);
        $this->assertEquals(2, $result);
    }
}

