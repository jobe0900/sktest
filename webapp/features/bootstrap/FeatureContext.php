<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use PHPUnit_Framework_Assert as PHPUnit;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Foundation\Testing\ApplicationTrait;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    // get an application instance
    use ApplicationTrait;

    private $user;

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
     * @BeforeScenario
     */
    public function setUp()
    {
        if(!$this->app)
        {
            $this->refreshApplication();
        }

        $this->user = User::findOrFail(1);

    }

    /**
     * Creates the application
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        return require __DIR__.'/../../bootstrap/start.php';
    }

    /**
     * @Given I visit the URL of the web application
     */
    public function iVisitTheUrlOfTheWebApplication()
    {
        $this->call('GET', '/');
    }

    /**
     * @When I log in
     */
    public function iLogIn()
    {
        // cannot call with the stored hashed password...
        $this->call('POST', 'login', array('email' => $this->user->email, 'password' => 'secret_pass'));
    }

    /**
     * @Then I should see the text :welcomeText
     */
    public function iShouldSeeTheText($welcomeText)
    {
        // actually get the username in the text string 
        $userNameText = str_replace('{my_username}', $this->user->username, $welcomeText);

        // ok manually redirect to the welcome page
        // don't know how to get there without installing Mink and some more
        $this->call('GET', 'welcome');

        // examine the DOM to see if the correct text is there
        $crawler = new Crawler($this->client->getResponse()->getContent());

        $h2text = $crawler->filterXPath('//body/div/h2')->text();
        PHPUnit::assertEquals($userNameText, $h2text);
    }

}
