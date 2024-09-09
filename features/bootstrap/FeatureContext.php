<?php

// features/bootstrap/FeatureContext.php

use Behat\Behat\Context\Context;

class FeatureContext implements Context
{
    /**
     * @Given I am on the homepage
     */
    public function iAmOnTheHomepage()
    {
        echo "home";
    }

    /**
     * @When I search for :arg1
     */
    public function iSearchFor($arg1)
    {
        echo $arg1;
    }

    /**
     * @Then I should see search results
     */
    public function iShouldSeeSearchResults()
    {
        echo "results";
    }

}
