<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->delete();
        for ($i=1; $i<=3; $i++) {
            DB::table('order_items')->insert([
                'order_id' => 1,
                'product_id' => $i,
                'quantity' => $i,
                'discount' => 0,
            ]);
        }
    }
}
