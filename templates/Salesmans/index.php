<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salesman[]|\Cake\Collection\CollectionInterface $salesmans
 */
?>
<div class="salesmans index content">
    <?= $this->Html->link(__('Novo Vendedor'), ['action' => 'add'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
    <h3>Lista de Vendedores</h3>
    <table class="table">
        <thead>
            <tr>
                <th>COD</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesmans as $salesman) : ?>
                <tr>
                    <td><?= $salesman->id ?></td>
                    <td><?= $salesman->name ?></td>
                     <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $salesman->id],['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $salesman->id],['class' => 'btn btn-sm btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $salesman->id], ['confirm' => __('Tem certeza que deseja remover esse vendedor?', $salesman->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
   
</div>
