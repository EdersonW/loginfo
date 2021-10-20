<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salesman $salesman
 */
?>
<div class="row">
    <aside class="column">
    <div class="side-nav">
        <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'mb-3 btn btn-sm btn-success']) ?>
            <h4 class="heading">Nome: <?= $salesman->name?></h4>
           
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salesmans view content">
           
            <table>
                <tr>
                    <th>Cod: </th>
                    <td><?=($salesman->id) ?></td>
                </tr>
            </table>
           
        </div>
    </div>
</div>
