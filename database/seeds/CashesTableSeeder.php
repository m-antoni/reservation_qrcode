<?php

use Illuminate\Database\Seeder;

class CashesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cash::class, 100)->create();
    }
}
