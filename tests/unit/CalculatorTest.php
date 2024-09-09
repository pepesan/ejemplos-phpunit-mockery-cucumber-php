<?php

namespace unit;

use Calculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once 'src/Calculator.php';

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testSubtract()
    {
        $calculator = new Calculator();
        $result = $calculator->subtract(5, 3);
        $this->assertEquals(2, $result);
    }

    #[DataProvider('additionProvider')]
    public function testAdd2($a, $b, $expected)
    {
        $calculator = new Calculator();
        $result = $calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }

    public static function additionProvider()
    {
        return [
            [1, 2, 3],
            [0, 0, 0],
            [-1, -1, -2],
            [5, 5, 10],
        ];
    }
}

