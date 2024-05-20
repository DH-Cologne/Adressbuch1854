<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonsFixture
 */
class PersonsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'surname' => ['type' => 'string', 'length' => 64, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'first_name' => ['type' => 'string', 'length' => 64, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'gender' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'title' => ['type' => 'string', 'length' => 42, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'name_predicate' => ['type' => 'string', 'length' => 42, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'specification_verbatim' => ['type' => 'string', 'length' => 128, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'profession_verbatim' => ['type' => 'string', 'length' => 128, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'de_l_institut' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'notable_commercant' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'bold' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'advert' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ldh_rank_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'military_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'social_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'occupation_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prof_category_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'prof_category_id' => ['type' => 'index', 'columns' => ['prof_category_id'], 'length' => []],
            'social_status_id' => ['type' => 'index', 'columns' => ['social_status_id'], 'length' => []],
            'ldh_rank_id' => ['type' => 'index', 'columns' => ['ldh_rank_id'], 'length' => []],
            'occupation_status_id' => ['type' => 'index', 'columns' => ['occupation_status_id'], 'length' => []],
            'military_status_id' => ['type' => 'index', 'columns' => ['military_status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'persons_ibfk_1' => ['type' => 'foreign', 'columns' => ['prof_category_id'], 'references' => ['prof_categories', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persons_ibfk_2' => ['type' => 'foreign', 'columns' => ['social_status_id'], 'references' => ['social_statuses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persons_ibfk_3' => ['type' => 'foreign', 'columns' => ['ldh_rank_id'], 'references' => ['ldh_ranks', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persons_ibfk_4' => ['type' => 'foreign', 'columns' => ['occupation_status_id'], 'references' => ['occupation_statuses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'persons_ibfk_5' => ['type' => 'foreign', 'columns' => ['military_status_id'], 'references' => ['military_statuses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 1,
                'surname' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'gender' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'name_predicate' => 'Lorem ipsum dolor sit amet',
                'specification_verbatim' => 'Lorem ipsum dolor sit amet',
                'profession_verbatim' => 'Lorem ipsum dolor sit amet',
                'de_l_institut' => 1,
                'notable_commercant' => 1,
                'bold' => 1,
                'advert' => 1,
                'ldh_rank_id' => 1,
                'military_status_id' => 1,
                'social_status_id' => 1,
                'occupation_status_id' => 1,
                'prof_category_id' => 1,
            ],
        ];
        parent::init();
    }
}
