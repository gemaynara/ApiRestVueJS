<?php

use Illuminate\Database\Seeder;

class MovimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\MovimentacaoConta::class, 1000)->create();
    }
}
