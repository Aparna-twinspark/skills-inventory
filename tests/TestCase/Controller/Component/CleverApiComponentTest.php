<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CleverApiComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CleverApiComponent Test Case
 */
class CleverApiComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\CleverApiComponent
     */
    public $CleverApiComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CleverApiComponent = new CleverApiComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CleverApiComponent);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
  
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test fetchData method
     *
     * @return void
     */

    public function testFetchData()
    {
        $result = $this->CleverApiComponent->fetchData('97c46874fd592c8d47b593a1dedcd72a86264b1e','districts');
        $this->assertContains('https://api.clever.com/v1.1/districts',$result);      
        // /$this->markTestIncomplete('Not implemented yet.');
    }
}
