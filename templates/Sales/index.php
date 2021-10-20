<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale[]|\Cake\Collection\CollectionInterface $sales
 */

use App\View\Helper\FormatHelper;

?>
<div class="sales index content">
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
    <h3>Lista das vendas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>COD</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Produto</th>
                <th>Qtd</th>
                <th>Preço</th>
                <th>Data Venda</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale) : ?>
                <tr>
                    <td><?= $sale->id ?></td>
                    <td><?= $sale->client->name ?></td>
                    <td><?= $sale->salesman->name ?></td>
                    <td><?= $sale->product->name ?></td>
                    <td><?= FormatHelper::formatDecimalBR($sale->product->qtd,3) ?></td>
                    <td>R$ <?= FormatHelper::formatDecimalBR($sale->product->price,2) ?></td>
                    <td><?= FormatHelper::formatDateBR($sale->date_sale) ?></td>
                 
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $sale->id],['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $sale->id], ['confirm' => __('Tem certeza que deseja remover essa venda?', $sale->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
   
</div>