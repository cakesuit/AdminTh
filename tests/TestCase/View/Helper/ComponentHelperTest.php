<?php
namespace Cakesuit\Admin\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cakesuit\Admin\View\Helper\ComponentHelper;

/**
 * Cakesuit\Admin\View\Helper\ComponentHelper Test Case
 */
class ComponentHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\View\Helper\ComponentHelper
     */
    public $Component;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Component = new ComponentHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Component);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
