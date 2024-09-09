<?php

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

require_once 'src/Calculator.php';

class CalculatorContext implements Context
{
    private $calculator;
    private $result;

    /**
     * @Given I have a calculator
     */
    public function iHaveACalculator()
    {
        $this->calculator = new Calculator();
    }

    /**
     * @When I add :num1 and :num2
     */
    public function iAddAnd($num1, $num2)
    {
        $this->result = $this->calculator->add($num1, $num2);
    }

    /**
     * @Then the result should be :expected
     */
    public function theResultShouldBe($expected)
    {
        Assert::assertEquals($expected, $this->result);
    }

}