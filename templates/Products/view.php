<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */

use App\View\Helper\FormatHelper;
use App\View\Helper\UtilHelper;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
            <h4 class="heading">Produto: <?= $product->name?></h4>
           
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <table>
               
                <tr>
                    <th>Cod: </th>
                    <td><?= ($product->id) ?></td>
                </tr>
                <tr>
                    <th>Unidade Medida: </th>
                    <td><?= UtilHelper::getDescUnitMeasurement($product->unit_measurement) ?></td>
                </tr>
                <tr>
                    <th>Quantidade: </th>
                    <td><?= FormatHelper::formatDecimalBR($product->qtd,3) ?></td>
                </tr>
                <tr>
                    <th>Preço: </th>
                    <td>R$ <?= FormatHelper::formatDecimalBR($product->price,2) ?></td>
                </tr>
                <tr>
                    <th>Produto Perecível: </th>
                    <td><?php if($product->product_perishable) {echo 'SIM';} else{ echo "NÃO";} ?></td>
                </tr>
                <tr>
                    <th>Validade: </th>
                    <td><?= FormatHelper::formatDateBR($product->date_validate) ?></td>
                </tr>
                <tr>
                    <th>Fabricação</th>
                    <td><?=  FormatHelper::formatDateBR($product->date_manufacturing) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
