<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExternalReferencesPersonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExternalReferencesPersonsTable Test Case
 */
class ExternalReferencesPersonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExternalReferencesPersonsTable
     */
    protected $ExternalReferencesPersons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExternalReferencesPersons',
        'app.ExternalReferences',
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
        $config = TableRegistry::getTableLocator()->exists('ExternalReferencesPersons') ? [] : ['className' => ExternalReferencesPersonsTable::class];
        $this->ExternalReferencesPersons = TableRegistry::getTableLocator()->get('ExternalReferencesPersons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExternalReferencesPersons);

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
