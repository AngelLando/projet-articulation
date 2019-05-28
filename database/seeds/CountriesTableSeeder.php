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
            'code' => 'IT',
            'name' => 'Italie',
        ]);
        DB::table('countries')->insert([
            'code' => 'CH',
            'name' => 'Suisse',
        ]);
        DB::table('countries')->insert([
            'code' => 'ES',
            'name' => 'Espagne',
        ]);
    }
}
