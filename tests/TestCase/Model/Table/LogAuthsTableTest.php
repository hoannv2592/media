<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogAuthsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogAuthsTable Test Case
 */
class LogAuthsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LogAuthsTable
     */
    public $LogAuths;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.log_auths'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LogAuths') ? [] : ['className' => 'App\Model\Table\LogAuthsTable'];
        $this->LogAuths = TableRegistry::get('LogAuths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LogAuths);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
