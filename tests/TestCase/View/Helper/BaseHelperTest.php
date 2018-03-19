<?php
namespace Cakesuit\Admin\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cakesuit\Admin\View\Helper\BaseComponentHelper;

/**
 * Cakesuit\Admin\View\Helper\BaseHelper Test Case
 */
class BaseHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\View\Helper\BaseComponentHelper
     */
    public $BaseHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->BaseHelper = new BaseComponentHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BaseHelper);

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
