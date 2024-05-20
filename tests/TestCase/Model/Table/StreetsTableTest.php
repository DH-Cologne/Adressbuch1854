<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StreetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StreetsTable Test Case
 */
class StreetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StreetsTable
     */
    protected $Streets;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Streets',
        'app.Addresses',
        'app.Arrondissements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Streets') ? [] : ['className' => StreetsTable::class];
        $this->Streets = TableRegistry::getTableLocator()->get('Streets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Streets);

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
