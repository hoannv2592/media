<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdgroupChangeHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdgroupChangeHistoriesTable Test Case
 */
class AdgroupChangeHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdgroupChangeHistoriesTable
     */
    public $AdgroupChangeHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adgroup_change_histories',
        'app.adgroups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdgroupChangeHistories') ? [] : ['className' => 'App\Model\Table\AdgroupChangeHistoriesTable'];
        $this->AdgroupChangeHistories = TableRegistry::get('AdgroupChangeHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdgroupChangeHistories);

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
