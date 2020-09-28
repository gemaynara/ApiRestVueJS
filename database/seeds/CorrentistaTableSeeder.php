<?php

use Illuminate\Database\Seeder;

class CorrentistaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Correntista::class, 100)->create();
    }
}
