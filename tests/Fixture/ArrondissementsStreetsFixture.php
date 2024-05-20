<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArrondissementsStreetsFixture
 */
class ArrondissementsStreetsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'arrondissement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'street_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'street_id' => ['type' => 'index', 'columns' => ['street_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['arrondissement_id', 'street_id'], 'length' => []],
            'arrondissements_streets_ibfk_1' => ['type' => 'foreign', 'columns' => ['arrondissement_id'], 'references' => ['arrondissements', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arrondissements_streets_ibfk_2' => ['type' => 'foreign', 'columns' => ['street_id'], 'references' => ['streets', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'arrondissement_id' => 1,
                'street_id' => 1,
            ],
        ];
        parent::init();
    }
}
