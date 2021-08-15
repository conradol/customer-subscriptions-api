<?php


use Phinx\Seed\AbstractSeed;

class PetSeeder extends AbstractSeed
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
                'subscription_id' => 1,
                'name' => 'Pet One',
                'gender' => 'female',
                'lifestage' => 'adult',
                'weight' => 10,
            ],
            [
                'subscription_id' => 1,
                'name' => 'Pet Two',
                'gender' => 'male',
                'lifestage' => 'puppy',
                'weight' => 3,
            ],
            [
                'subscription_id' => 2,
                'name' => 'Pet Three',
                'gender' => 'male',
                'lifestage' => 'senior',
                'weight' => 7,
            ]
        ];

        $subscription = $this->table('pet');
        $subscription
            ->insert($data)
            ->save();
    }
}
