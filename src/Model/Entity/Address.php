<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int|null $houseno
 * @property string|null $houseno_specification
 * @property float|null $geo_long
 * @property float|null $geo_lat
 * @property string|null $address_specification_verbatim
 * @property int|null $street_id
 *
 * @property \App\Model\Entity\Street $street
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Person[] $persons
 */
class Address extends Entity
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
        'houseno' => true,
        'houseno_specification' => true,
        'geo_long' => true,
        'geo_lat' => true,
        'address_specification_verbatim' => true,
        'street_id' => true,
        'street' => true,
        'companies' => true,
        'persons' => true,
    ];
}
