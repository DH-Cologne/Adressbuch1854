<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesExternalReferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesExternalReferencesTable Test Case
 */
class CompaniesExternalReferencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesExternalReferencesTable
     */
    protected $CompaniesExternalReferences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CompaniesExternalReferences',
        'app.Companies',
        'app.ExternalReferences',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CompaniesExternalReferences') ? [] : ['className' => CompaniesExternalReferencesTable::class];
        $this->CompaniesExternalReferences = TableRegistry::getTableLocator()->get('CompaniesExternalReferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CompaniesExternalReferences);

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
