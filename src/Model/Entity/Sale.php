<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $client_id
 * @property int $salesman_id
 * @property \Cake\I18n\FrozenDate $date_sale
 * @property string $qtd_product
 * @property string $total
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Salesman $salesman
 */
class Sale extends Entity
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
        'product_id' => true,
        'client_id' => true,
        'salesman_id' => true,
        'date_sale' => true,
        'qtd_product' => true,
        'total' => true,
        'product' => true,
        'client' => true,
        'salesman' => true,
    ];
}
