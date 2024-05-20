<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesOriginalReferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesOriginalReferencesTable Test Case
 */
class CompaniesOriginalReferencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesOriginalReferencesTable
     */
    protected $CompaniesOriginalReferences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CompaniesOriginalReferences',
        'app.Companies',
        'app.OriginalReferences',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CompaniesOriginalReferences') ? [] : ['className' => CompaniesOriginalReferencesTable::class];
        $this->CompaniesOriginalReferences = TableRegistry::getTableLocator()->get('CompaniesOriginalReferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CompaniesOriginalReferences);

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
