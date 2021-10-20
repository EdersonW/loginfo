<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<div class="clients index content">
    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
    <h3>Lista de Clientes</h3>
    <table class="table">
        <thead>
            <tr>
                <th>COD</th>
                <th>Nome</th>
               
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client) : ?>
                <tr>
                    <td><?= $client->id ?></td>
                    <td><?= $client->name ?></td>
                  
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $client->id],['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->id],['class' => 'btn btn-sm btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $client->id], ['confirm' => __('Tem certeza que deseja remover esse cliente?', $client->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
