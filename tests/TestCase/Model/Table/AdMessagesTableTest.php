<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdMessagesTable Test Case
 */
class AdMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdMessagesTable
     */
    public $AdMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdMessages') ? [] : ['className' => 'App\Model\Table\AdMessagesTable'];
        $this->AdMessages = TableRegistry::get('AdMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdMessages);

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
