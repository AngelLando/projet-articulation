<?php

use Illuminate\Database\Seeder;

class FormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formats')->insert([
            'name'=> 'Demies',
        ]);
        DB::table('formats')->insert([
            'name'=> '75cl',
        ]);
        DB::table('formats')->insert([
            'name'=> 'Magnums',
        ]);
        DB::table('formats')->insert([
            'name'=> 'Double Magnums',
        ]);
        DB::table('formats')->insert([
            'name'=> 'Impériale',
        ]);
        DB::table('formats')->insert([
            'name'=> 'Bouteilles Vaudoises',
        ]);
    }
}
