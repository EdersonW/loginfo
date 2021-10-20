<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */

use App\View\Helper\FormatHelper;

?>
<div class="row">
    <aside class="column">
    <div class="side-nav">
        <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
            <h4 class="heading">Venda: <?= $sale->id?></h4>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
           
            <table>
                <tr>
                    <th>Produto: </th>
                    <td><?= ($sale->product->name) ?></td>
                </tr>
                <tr>
                    <th>Quantidade: </th>
                    <td><?= FormatHelper::formatDecimalBR($sale->product->qtd,3) ?></td>
                </tr>
                <tr>
                    <th>Total: </th>
                    <td>R$ <?= FormatHelper::formatDecimalBR($sale->product->price,2) ?></td>
                </tr>
                <tr>
                    <th>Cliente: </th>
                    <td><?= $sale->client->name ?></td>
                </tr>
                <tr>
                    <th>Vendedor: </th>
                    <td><?= $sale->salesman->name ?></td>
                </tr>
                <tr>
                    <th>Data Venda: </th>
                    <td><?= FormatHelper::formatDateBR($sale->date_sale) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
