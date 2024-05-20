<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OriginalReference Entity
 *
 * @property int $id
 * @property int|null $scan_no
 * @property int|null $begin_page_no
 * @property int|null $end_page_no
 *
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Person[] $persons
 */
class OriginalReference extends Entity
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
        'scan_no' => true,
        'begin_page_no' => true,
        'end_page_no' => true,
        'companies' => true,
        'persons' => true,
    ];
}
