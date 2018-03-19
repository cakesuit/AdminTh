<?php
namespace Cakesuit\Admin\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Cakesuit\Admin\View\Helper\InfoBoxHelper;

/**
 * Cakesuit\Admin\View\Helper\InfoComponentHelper Test Case
 */
class InfoComponentHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\View\Helper\InfoBoxHelper
     */
    public $InfoComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->InfoComponent = new InfoBoxHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfoComponent);

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
