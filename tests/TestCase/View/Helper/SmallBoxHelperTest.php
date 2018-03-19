<?php
namespace Cakesuit\Admin\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cakesuit\Admin\View\Helper\SmallBoxHelper;

/**
 * Cakesuit\Admin\View\Helper\SmallBoxHelper Test Case
 */
class SmallBoxHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\View\Helper\SmallBoxHelper
     */
    public $SmallBox;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->SmallBox = new SmallBoxHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SmallBox);

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
