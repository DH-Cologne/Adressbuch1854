<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OriginalReferencesPersonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OriginalReferencesPersonsTable Test Case
 */
class OriginalReferencesPersonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OriginalReferencesPersonsTable
     */
    protected $OriginalReferencesPersons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OriginalReferencesPersons',
        'app.OriginalReferences',
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
        $config = TableRegistry::getTableLocator()->exists('OriginalReferencesPersons') ? [] : ['className' => OriginalReferencesPersonsTable::class];
        $this->OriginalReferencesPersons = TableRegistry::getTableLocator()->get('OriginalReferencesPersons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OriginalReferencesPersons);

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
