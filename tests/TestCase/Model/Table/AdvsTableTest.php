<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvsTable Test Case
 */
class AdvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvsTable
     */
    public $Advs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advs',
        'app.devices',
        'app.users',
        'app.campaign_groups',
        'app.partner_vouchers',
        'app.partners',
        'app.device_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Advs') ? [] : ['className' => 'App\Model\Table\AdvsTable'];
        $this->Advs = TableRegistry::get('Advs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advs);

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
