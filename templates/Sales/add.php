<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading">Criar nova venda</h4>
        </div>
    </aside>
    <div class="col-md-12">
        <div class="products form content">
            <?= $this->Form->create($sale) ?>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Produto</label>
                    <select class="form-control" required id="product" name="product">
                        <?php foreach ($products as $product) { ?>
                            <option value="<?= $product->id ?>"><?= $product->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Cliente</label>
                    <select class="form-control" required id="client" name="client">
                        <?php foreach ($clients as $client) { ?>
                            <option value="<?= $client->id ?>"><?= $client->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Vendedor</label>
                    <select class="form-control" required id="salesman" name="salesman">
                        <?php foreach ($salesmans as $salesman) { ?>
                            <option value="<?= $salesman->id ?>"><?= $salesman->name ?></option>
                        <?php } ?>
                    </select>
                </div>


            </div>

            <input type="submit" class="btn btn-success" value="Salvar" />
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
</div>