<?php
namespace Cakesuit\Admin\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cakesuit\Admin\View\Helper\BoxHelper;

/**
 * Cakesuit\Admin\View\Helper\BoxHelper Test Case
 */
class BoxHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\View\Helper\BoxHelper
     */
    public $Box;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Box = new BoxHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Box);

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
