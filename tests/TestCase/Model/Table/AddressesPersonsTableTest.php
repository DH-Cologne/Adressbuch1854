<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesPersonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressesPersonsTable Test Case
 */
class AddressesPersonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesPersonsTable
     */
    protected $AddressesPersons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AddressesPersons',
        'app.Addresses',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AddressesPersons') ? [] : ['className' => AddressesPersonsTable::class];
        $this->AddressesPersons = TableRegistry::getTableLocator()->get('AddressesPersons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AddressesPersons);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
