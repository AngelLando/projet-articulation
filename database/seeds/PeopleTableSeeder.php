<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            ['firstname' => 'Joy', 'lastname' => 'Oppliger', 'prefix' => 'Mme', 'gender' => 'f'],
            ['firstname' => 'Pauline', 'lastname' => 'Baeni', 'prefix' => 'Mme', 'gender' => 'f'],
            ['firstname' => 'Ksenia', 'lastname' => 'Mironova', 'prefix' => 'Mme', 'gender' => 'f']
        ]);
    }
}
