<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArrondissementsStreetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArrondissementsStreetsTable Test Case
 */
class ArrondissementsStreetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArrondissementsStreetsTable
     */
    protected $ArrondissementsStreets;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ArrondissementsStreets',
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
        $config = TableRegistry::getTableLocator()->exists('ArrondissementsStreets') ? [] : ['className' => ArrondissementsStreetsTable::class];
        $this->ArrondissementsStreets = TableRegistry::getTableLocator()->get('ArrondissementsStreets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ArrondissementsStreets);

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
