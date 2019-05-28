<?php

use Illuminate\Database\Seeder;

class ShippingCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_costs')->insert([
            'type' => 'free',
            'amount' => 0
        ]);
        DB::table('shipping_costs')->insert([
            'type' => 'b12',
            'amount' => 30
        ]);
        DB::table('shipping_costs')->insert([
            'type' => 'b23',
            'amount' => 35
        ]);
        DB::table('shipping_costs')->insert([
            'type' => 'b35',
            'amount' => 40
        ]);
    }
}
