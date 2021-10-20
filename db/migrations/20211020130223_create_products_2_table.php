<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProducts2Table extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('products');
        $table->changeColumn('id', 'biginteger', ['identity' => true])
              ->addColumn('name', 'string',[ 'null' => false, 'limit' => 50])
              ->addColumn('qtd', 'decimal',[
                'null' => false,
                'precision'=>10,
                'scale'=>3])
              ->addColumn('price', 'decimal',[
                'null' => false,
                'precision'=>10,
                'scale'=>4])
              ->addColumn('unit_measurement', 'biginteger')
              ->addColumn('product_perishable', 'boolean',[ 'null' => false])
              ->addColumn('date_validate', 'date')
              ->addColumn('date_manufacturing', 'date',[ 'null' => false])
              ->create();
    }

  
}
