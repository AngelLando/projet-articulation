<?php

use Illuminate\Database\Seeder;

class AppellationProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appellation_product')->delete();
        for ($i=1; $i<=4; $i++) {
            DB::table('appellation_product')->insert([
                'appellation_id' => $i,
                'product_id' => $i
            ]);
        }
    }
}
