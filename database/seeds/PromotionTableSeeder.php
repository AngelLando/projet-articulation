<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            ['type'=> 'Aucune', 'amount' => 0],
            ['type'=> 'Offre de fin de lot', 'amount' => 10],
            ['type' => 'Offre spéciale', 'amount' => 20],
        ]);
    }
}
