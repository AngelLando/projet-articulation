<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            'type' => 'Normal',
            'amount' => 27.50
        ]);
        DB::table('prices')->insert([
            'type'=> 'Normal',
            'amount' => 19.90
        ]);
        DB::table('prices')->insert([
            'type'=> 'Offre de fin de lot',
            'amount' => 24
        ]);
        DB::table('prices')->insert([
            'type' => 'Offre spéciale',
            'amount' => 23
        ]);
        DB::table('prices')->insert([
            'type'=> 'Normal',
            'amount'=> 350
        ]);
    }
}
