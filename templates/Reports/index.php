<?php

/**
 * @var \App\View\AppView $this
 * 
 */

use App\View\Helper\FormatHelper;

?>
<div class="reports index content">
    <div class="row mb-3">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading">Localizar Venda</h4>
            </div>
        </aside>
        <div class="col-md-12">
            <div class="products form content">
                <?= $this->Form->create() ?>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Data início</label>
                        <input type="date" name="dateStart" required class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Data fim</label>
                        <input type="date" name="dateEnd" required class="form-control">
                    </div>

                </div>

            </div>
            <input type="submit" class="btn btn-sm btn-primary" value="Localizar" />

            <?= $this->Form->end() ?>

        </div>
    </div>


    <?php if ($sales ?? '') { ?>
        <div class="row mb-3">


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
                            <td><?= FormatHelper::formatDecimalBR($sale->product->qtd, 3) ?></td>
                            <td>R$ <?= FormatHelper::formatDecimalBR($sale->product->price, 2) ?></td>
                            <td><?= FormatHelper::formatDateBR($sale->date_sale) ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    <?php } ?>
</div>