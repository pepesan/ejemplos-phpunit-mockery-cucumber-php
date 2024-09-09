Feature: Search
  In order to find products
  As a customer
  I need to be able to search for products

  Scenario: Search for an existing product
    Given I am on the homepage
    When I search for "phone"
    Then I should see search results