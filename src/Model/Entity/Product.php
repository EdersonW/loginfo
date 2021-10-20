<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $unit_measurement
 * @property string|null $qtd
 * @property string $price
 * @property int $product_perishable
 * @property \Cake\I18n\FrozenDate|null $date_validate
 * @property \Cake\I18n\FrozenDate|null $date_manufacturing
 */
class Product extends Entity
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
        'name' => true,
        'unit_measurement' => true,
        'qtd' => true,
        'price' => true,
        'product_perishable' => true,
        'date_validate' => true,
        'date_manufacturing' => true,
    ];
}
