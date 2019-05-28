<?php

use Illuminate\Database\Seeder;

class PriceProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_product')->delete();
        for ($i=1; $i<=4; $i++) {
            DB::table('price_product')->insert([
                'price_id' => $i,
                'product_id' => $i
            ]);
        }
    }
}
