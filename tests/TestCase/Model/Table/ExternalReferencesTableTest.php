<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExternalReferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExternalReferencesTable Test Case
 */
class ExternalReferencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExternalReferencesTable
     */
    protected $ExternalReferences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExternalReferences',
        'app.ReferenceTypes',
        'app.Companies',
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
        $config = TableRegistry::getTableLocator()->exists('ExternalReferences') ? [] : ['className' => ExternalReferencesTable::class];
        $this->ExternalReferences = TableRegistry::getTableLocator()->get('ExternalReferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExternalReferences);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
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
