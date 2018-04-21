<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacebooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacebooksTable Test Case
 */
class FacebooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacebooksTable
     */
    public $Facebooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facebooks',
        'app.campaign_groups',
        'app.partner_vouchers',
        'app.partners',
        'app.devices',
        'app.users',
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
        $config = TableRegistry::exists('Facebooks') ? [] : ['className' => 'App\Model\Table\FacebooksTable'];
        $this->Facebooks = TableRegistry::get('Facebooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Facebooks);

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
