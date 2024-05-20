<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LdhRanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LdhRanksTable Test Case
 */
class LdhRanksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LdhRanksTable
     */
    protected $LdhRanks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LdhRanks',
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
        $config = TableRegistry::getTableLocator()->exists('LdhRanks') ? [] : ['className' => LdhRanksTable::class];
        $this->LdhRanks = TableRegistry::getTableLocator()->get('LdhRanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LdhRanks);

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
