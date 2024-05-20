<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arrondissement Entity
 *
 * @property int $id
 * @property int|null $no
 * @property int|null $insee_citycode
 * @property string|null $type
 * @property int|null $postcode
 *
 * @property \App\Model\Entity\Street[] $streets
 */
class Arrondissement extends Entity
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
        'no' => true,
        'insee_citycode' => true,
        'type' => true,
        'postcode' => true,
        'streets' => true,
    ];
}
