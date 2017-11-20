<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartnerVouchersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartnerVouchersTable Test Case
 */
class PartnerVouchersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PartnerVouchersTable
     */
    public $PartnerVouchers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.partner_vouchers',
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
        $config = TableRegistry::exists('PartnerVouchers') ? [] : ['className' => 'App\Model\Table\PartnerVouchersTable'];
        $this->PartnerVouchers = TableRegistry::get('PartnerVouchers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PartnerVouchers);

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
