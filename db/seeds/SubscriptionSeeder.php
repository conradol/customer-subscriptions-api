<?php


use Phinx\Seed\AbstractSeed;

class SubscriptionSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'customer_id' => 1,
                'base_price' => 50,
                'total_price' => 100,
                'next_order_date' => '2021-08-14'
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'base_price' => 50,
                'total_price' => 50,
                'next_order_date' => '2021-08-15'
            ]
        ];

        $subscription = $this->table('subscription');
        $subscription
            ->insert($data)
            ->save();
    }
}
