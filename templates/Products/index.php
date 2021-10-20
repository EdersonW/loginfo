<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */

use App\View\Helper\FormatHelper;
use App\View\Helper\UtilHelper;

?>
<div class="products index content">
    <?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
    <h3>Lista de Produtos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>COD</th>
                <th>Item</th>
                <th>Qtd</th>
                <th>Und Medida</th>
                <th>Preço</th>
                <th>Perecível</th>
                <th>Validade</th>
                <th>Fabricação</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= FormatHelper::formatDecimalBR($product->qtd,3) ?></td>
                    <td><?= UtilHelper::getDescUnitMeasurement($product->unit_measurement) ?></td>
                    <td>R$ <?= FormatHelper::formatDecimalBR($product->price,2) ?></td>
                    <td><?php if($product->product_perishable) {echo 'SIM';} else{ echo "NÃO";} ?></td>
                    <td><?= FormatHelper::formatDateBR($product->date_validate) ?></td>
                    <td><?=  FormatHelper::formatDateBR($product->date_manufacturing) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(('Visualizar'), ['action' => 'view', $product->id],['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(('Editar'), ['action' => 'edit', $product->id],['class' => 'btn btn-sm btn-secondary']) ?>
                        <?= $this->Form->postLink(('Excluir'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja remover esse produto?', $product->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
   
</div>