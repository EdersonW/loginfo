<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */

use App\View\Helper\UtilHelper;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading">Criar novo produto</h4>
        </div>
    </aside>
    <div class="col-md-12">
        <div class="products form content">
            <?= $this->Form->create($product, ['id' => 'my-form', 'name' => 'my-form']) ?>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Nome do item</label>
                    <input type="text" name="name" required id="name" max="50" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Unidade Medida</label>
                    <select class="form-control" id="unit_measurement" name="unit_measurement">
                            <?php echo UtilHelper::getListUnitMeasurement($product->unit_measurement)?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Quantidade</label>
                    <div class="input-group mb-3">
                        <input type="text" id="qtd" required name="qtd" class="form-control">
                        <span class="input-group-text" id="type-qtd">lt</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-label">Preço</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <input type="text" id="price" required name="price" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Produto Perecível</label>
                    <select class="form-control" required id="product_perishable" name="product_perishable">
                        <option value="1">Não</option>
                        <option value="2">Sim</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data Validade</label>
                    <input type="date" id="date_validate" name="date_validate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data Fabricação</label>
                    <input type="date" id="date_manufacturing" required name="date_manufacturing" class="form-control">
                </div>
            </div>
            <input type="submit"class="btn btn-success" value="Salvar" onclick="return checkForm()" />
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
           
        </div>
    </div>
</div>
<?php

$this->start('script');
   echo $this->Html->script('product');
$this->end(); ?>