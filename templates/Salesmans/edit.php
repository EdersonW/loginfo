<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salesman $salesman
 */
?>
<div class="row">
<aside class="column">
        <div class="side-nav">
            <h4 class="heading">Alterar Vendedor</h4>
        </div>
    </aside>
    <div class="col-md-12 mb-2">
        <div class="products form content">
            <?= $this->Form->create($salesman) ?>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label class="form-label">Nome do Vendedor</label>
                    <input type="text" value="<?=$salesman->name?>" name="name" required class="form-control">
                </div>
            </div>
            <input type="submit"class="btn btn-success" value="Salvar" />
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
           
        </div>
    </div>
</div>
