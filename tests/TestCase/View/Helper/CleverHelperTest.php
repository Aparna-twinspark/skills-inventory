<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CleverHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CleverHelper Test Case
 */
class CleverHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CleverHelper
     */
    public $CleverHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->CleverHelper = new CleverHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CleverHelper);

        parent::tearDown();
    }

    /**
     * Test loginButton method
     *
     * @return void
     */
    public function testLoginButton()
    {
        $result = $this->CleverHelper->loginButton('small');
        $this->assertContains('sign-in-with-clever-small.png1', $result);
    }
}
