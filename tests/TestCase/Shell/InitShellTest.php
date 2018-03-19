<?php
namespace Cakesuit\Admin\Test\TestCase\Shell;

use Cake\TestSuite\ConsoleIntegrationTestCase;
use Cakesuit\Admin\Shell\CakesuitAdminInitShell;

/**
 * Cakesuit\Admin\Shell\InitShell Test Case
 */
class InitShellTest extends ConsoleIntegrationTestCase
{

    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \Cakesuit\Admin\Shell\CakesuitAdminInitShell
     */
    public $Init;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();
        $this->Init = new CakesuitAdminInitShell($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Init);

        parent::tearDown();
    }

    /**
     * Test getOptionParser method
     *
     * @return void
     */
    public function testGetOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
