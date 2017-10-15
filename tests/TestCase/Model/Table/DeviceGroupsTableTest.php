<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeviceGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeviceGroupsTable Test Case
 */
class DeviceGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeviceGroupsTable
     */
    public $DeviceGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.device_groups',
        'app.adgroups',
        'app.devices',
        'app.users',
        'app.partners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeviceGroups') ? [] : ['className' => 'App\Model\Table\DeviceGroupsTable'];
        $this->DeviceGroups = TableRegistry::get('DeviceGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeviceGroups);

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
