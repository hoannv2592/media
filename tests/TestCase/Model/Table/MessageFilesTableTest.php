<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageFilesTable Test Case
 */
class MessageFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageFilesTable
     */
    public $MessageFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_files',
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
        $config = TableRegistry::exists('MessageFiles') ? [] : ['className' => 'App\Model\Table\MessageFilesTable'];
        $this->MessageFiles = TableRegistry::get('MessageFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageFiles);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
