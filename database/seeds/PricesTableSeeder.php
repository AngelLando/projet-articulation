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
            ['type' => 'Normal', 'amount' => 27.50],
            ['type'=> 'Normal', 'amount' => 19.90],
            ['type'=> 'Offre de fin de lot', 'amount' => 24],
            ['type' => 'Offre spéciale', 'amount' => 23],
            ['type'=> 'Normal', 'amount'=> 350]
        ]);
    }
}
