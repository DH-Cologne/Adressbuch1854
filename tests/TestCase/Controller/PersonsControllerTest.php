<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\PersonsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\PersonsController Test Case
 *
 * @uses \App\Controller\PersonsController
 */
class PersonsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Persons',
        'app.LdhRanks',
        'app.MilitaryStatuses',
        'app.SocialStatuses',
        'app.OccupationStatuses',
        'app.ProfCategories',
        'app.Addresses',
        'app.Companies',
        'app.ExternalReferences',
        'app.OriginalReferences',
        'app.AddressesPersons',
        'app.CompaniesPersons',
        'app.ExternalReferencesPersons',
        'app.OriginalReferencesPersons',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
