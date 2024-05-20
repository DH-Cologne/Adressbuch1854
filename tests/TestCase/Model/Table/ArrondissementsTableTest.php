<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArrondissementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArrondissementsTable Test Case
 */
class ArrondissementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArrondissementsTable
     */
    protected $Arrondissements;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Arrondissements',
        'app.Streets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Arrondissements') ? [] : ['className' => ArrondissementsTable::class];
        $this->Arrondissements = TableRegistry::getTableLocator()->get('Arrondissements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Arrondissements);

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
