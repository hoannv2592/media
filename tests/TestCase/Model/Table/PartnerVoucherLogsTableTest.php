<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartnerVoucherLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartnerVoucherLogsTable Test Case
 */
class PartnerVoucherLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PartnerVoucherLogsTable
     */
    public $PartnerVoucherLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.partner_voucher_logs',
        'app.campaign_groups',
        'app.users',
        'app.devices',
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
        $config = TableRegistry::exists('PartnerVoucherLogs') ? [] : ['className' => 'App\Model\Table\PartnerVoucherLogsTable'];
        $this->PartnerVoucherLogs = TableRegistry::get('PartnerVoucherLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PartnerVoucherLogs);

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
