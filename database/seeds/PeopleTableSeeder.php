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
            'firstname' => 'Joy',
            'lastname' => 'Oppliger',
            'prefix' => 'Mme',
            'gender' => 'F'
        ]);
        DB::table('people')->insert([
            'firstname' => 'Pauline',
            'lastname' => 'Baeni',
            'prefix' => 'Mme',
            'gender' => 'F'
        ]);
        DB::table('people')->insert([
            'firstname' => 'Ksenia',
            'lastname' => 'Mironova',
            'prefix' => 'Mme',
            'gender' => 'F'
        ]);
    }
}
