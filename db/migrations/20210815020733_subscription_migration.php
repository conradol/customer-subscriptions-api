<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SubscriptionMigration extends AbstractMigration
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
        $table = $this->table('subscription');
        $table
            ->addColumn('customer_id', 'integer')
            ->addColumn('base_price', 'decimal')
            ->addColumn('total_price', 'decimal')
            ->addColumn('next_order_date', 'date')
            ->addColumn('create_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
