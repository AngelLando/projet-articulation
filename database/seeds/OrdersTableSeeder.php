<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


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
        $date = $this->randDate();

        DB::table('orders')->insert([
                ['delivery_method' => 'Test', 'tva' => 7.7, 'discount' => 0, 'payment_method' => 'Paypal', 'gift' => 0, 'shipping_status' => 'Envoyée', 'payment_status' => 'Payée', 'cgv' => 1,'address_id_1' => 1, 'address_id_2' => 1, 'address_id_3' => 1, 'shipping_cost_id' => 2, 'created_at' => $date],
            ]);

    }

    private function randDate() {
        $nbJours = rand(-30,0);
        return Carbon::now()->addDays($nbJours);
    }
}
