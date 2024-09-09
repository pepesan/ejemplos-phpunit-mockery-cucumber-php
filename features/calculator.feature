Feature: Calculator Addition
  In order to perform basic arithmetic
  As a user of the calculator
  I need to be able to add two numbers

  Scenario: Add two positive numbers
    Given I have a calculator
    When I add 5 and 7
    Then the result should be 12

  Scenario: Add a positive and a negative number
    Given I have a calculator
    When I add 10 and -3
    Then the result should be 7

  Scenario: Add two negative numbers
    Given I have a calculator
    When I add -4 and -6
    Then the result should be -10

  Scenario Outline: Add various number combinations
    Given I have a calculator
    When I add <number1> and <number2>
    Then the result should be <result>

    Examples:
      | number1 | number2 | result |
      | 0       | 0       | 0      |
      | 1       | 99      | 100    |
      | -50     | 50      | 0      |
      | 1.5     | 2.7     | 4.2    |