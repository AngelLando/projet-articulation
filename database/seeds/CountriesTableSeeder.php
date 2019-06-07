<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['code' => 'IT', 'name' => 'Italie'],
            ['code' => 'CH', 'name' => 'Suisse'],
            ['code' => 'ES', 'name' => 'Espagne'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'CL', 'name' => 'Chili'],
            ['code' => 'IL', 'name' => 'Israel'],
            ['code' => 'NZ', 'name' => 'Nouvelle-Zélande'],
        ]);
    }
}
