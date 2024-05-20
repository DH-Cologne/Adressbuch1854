<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OriginalReferencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OriginalReferencesTable Test Case
 */
class OriginalReferencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OriginalReferencesTable
     */
    protected $OriginalReferences;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OriginalReferences',
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
        $config = TableRegistry::getTableLocator()->exists('OriginalReferences') ? [] : ['className' => OriginalReferencesTable::class];
        $this->OriginalReferences = TableRegistry::getTableLocator()->get('OriginalReferences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OriginalReferences);

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
}
