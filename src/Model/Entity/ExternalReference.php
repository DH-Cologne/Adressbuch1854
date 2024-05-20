<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExternalReference Entity
 *
 * @property int $id
 * @property string|null $reference
 * @property string|null $short_description
 * @property string|null $link
 * @property int|null $reference_type_id
 *
 * @property \App\Model\Entity\ReferenceType $reference_type
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Person[] $persons
 */
class ExternalReference extends Entity
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
        'reference' => true,
        'short_description' => true,
        'link' => true,
        'reference_type_id' => true,
        'reference_type' => true,
        'companies' => true,
        'persons' => true,
    ];
}
