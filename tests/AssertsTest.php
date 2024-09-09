<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Calculator.php';

class AssertsTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->add(2, 3));
    }

    public function testSubtract()
    {
        $calculator = new Calculator();
        $this->assertSame(2, $calculator->subtract(5, 3));
    }

    public function testMultiply()
    {
        $calculator = new Calculator();
        $this->assertGreaterThan(10, $calculator->multiply(5, 3));
    }

    public function testDivide()
    {
        $calculator = new Calculator();
        $this->assertNotEquals(3, $calculator->divide(10, 3));
    }

    public function testDivideByZero()
    {
        $calculator = new Calculator();
        $this->expectException(InvalidArgumentException::class);
        $calculator->divide(10, 0);
    }

    public function testIsEven()
    {
        $calculator = new Calculator();
        $this->assertTrue($calculator->isEven(4));
        $this->assertFalse($calculator->isEven(5));
    }

    public function testArrayHasKey()
    {
        $array = ['key' => 'value'];
        $this->assertArrayHasKey('key', $array);
    }

    public function testContainsOnly()
    {
        $array = [2, 4, 6, 8];
        $this->assertContainsOnly('int', $array);
    }

    public function testCount()
    {
        $array = [1, 2, 3];
        $this->assertCount(3, $array);
    }

    public function testStringContainsString()
    {
        $string = 'Hello, PHPUnit!';
        $this->assertStringContainsString('PHPUnit', $string);
    }

    public function testFileExists()
    {
        $filePath = __FILE__; // El archivo actual del test
        $this->assertFileExists($filePath);
    }

    #[Test]
    public function testDivisionByZeroThrowsException(): void
    {
        // Esperamos que ocurra una excepción de tipo DivisionByZeroError
        $this->expectException(DivisionByZeroError::class);

        // Ejecutamos una división por cero directamente
        $result = 10 / 0;
    }
}

