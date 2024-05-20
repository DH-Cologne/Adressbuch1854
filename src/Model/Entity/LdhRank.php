<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LdhRank Entity
 *
 * @property int $id
 * @property string|null $rank
 * @property int $index_no
 *
 * @property \App\Model\Entity\Person[] $persons
 */
class LdhRank extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'rank' => true,
        'index_no' => true,
        'persons' => true,
    ];
}
