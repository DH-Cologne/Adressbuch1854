<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Street Entity
 *
 * @property int $id
 * @property string|null $name_old_verbatim
 * @property string|null $name_old_clean
 * @property string|null $name_new
 * @property float|null $geo_long
 * @property float|null $geo_lat
 *
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Arrondissement[] $arrondissements
 */
class Street extends Entity
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
        'name_old_verbatim' => true,
        'name_old_clean' => true,
        'name_new' => true,
        'geo_long' => true,
        'geo_lat' => true,
        'addresses' => true,
        'arrondissements' => true,
    ];
}
