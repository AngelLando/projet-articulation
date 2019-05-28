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
            ['name'=> 'Demies'],
            ['name'=> '75cl'],
            ['name'=> 'Magnums'],
            ['name'=> 'Double Magnums'],
            ['name'=> 'Impériale'],
            ['name'=> 'Bouteilles Vaudoises']
        ]);
    }
}
