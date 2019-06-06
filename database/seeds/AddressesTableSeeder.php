<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->delete();
        for ($i=1; $i<=3; $i++) {
            DB::table('addresses')->insert([
                'street' => 'street' . $i,
                'npa' => 100 . $i,
                'city' => 'city' . $i,
                'region' => 'region'. $i,
                'country' => 'CH',
                'person_id' => $i
            ]);
        }
    }
}
