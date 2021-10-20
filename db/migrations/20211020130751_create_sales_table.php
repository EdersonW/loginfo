<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSalesTable extends AbstractMigration
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
        $table = $this->table('sales');
        $table->changeColumn('id', 'biginteger', ['identity' => true])
              ->addColumn('product_id', 'biginteger' )
              ->addColumn('client_id', 'biginteger' )
              ->addColumn('salesman_id', 'biginteger' )
              ->addColumn('date_sale', 'date' ,[ 'null' => false])
              ->addForeignKey('client_id', 'clients', 'id',[ 'delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
              ->addForeignKey('salesman_id', 'salesmans', 'id', [ 'delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
              ->addForeignKey('product_id', 'products', 'id', [ 'delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION',])
              ->create();
    }
}

