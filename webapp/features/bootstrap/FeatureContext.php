<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I visit the URL of the web application
     */
    public function iVisitTheUrlOfTheWebApplication()
    {
        throw new PendingException();
    }

    /**
     * @When I log in
     */
    public function iLogIn()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the text :arg1
     */
    public function iShouldSeeTheText($arg1)
    {
        throw new PendingException();
    }
}
