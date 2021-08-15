<?php


use Phinx\Seed\AbstractSeed;

class CustomerSeeder extends AbstractSeed
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
                'email' => 'email@email.com',
                'name'  => 'Customer One',
                'birthdate' => date('1991-09-11'),
                'gender' => 'male'
            ],
            [
                'id' => 2,
                'email' => 'email@email.com',
                'name'  => 'Customer Two',
                'birthdate' => date('1991-09-11'),
                'gender' => 'female'
            ]
        ];

        $customer = $this->table('customer');
        $customer
            ->insert($data)
            ->save();
    }
}
