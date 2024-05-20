<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfessionFixture
 */
class ProfessionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'profession';
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
                'profession_verbatim' => 'Lorem ipsum dolor sit amet',
                'profession_unified' => 'Lorem ipsum dolor sit amet',
                'norm' => 'Lorem ipsum dolor sit amet',
                'ind' => 'Lorem ips',
                'ohab_ges' => 'Lorem ipsum dolor sit amet',
                'ohdab' => 'Lorem ips',
            ],
        ];
        parent::init();
    }
}
