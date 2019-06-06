<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

            DB::table('orders')->insert([
                ['delivery_method' => 'Test', 'tva' => 7.7, 'discount' => 0, 'payment_method' => 'Paypal', 'gift' => 0, 'shipping_status' => 'envoyé', 'payment_status' => 'payé', 'address_id_1' => 1, 'address_id_2' => 1, 'address_id_3' => 1, 'shipping_cost_id' => 1],
            ]);

    }
}
