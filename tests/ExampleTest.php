<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    #[Test]
    #[TestDox('Comprueba que es True')]
    public function testTrueAssertsToTrue()
    {
        $this->assertTrue(true);
    }
}

