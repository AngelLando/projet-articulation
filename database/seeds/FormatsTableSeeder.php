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
            ['name'=> 'Demies (D)'],
            ['name'=> '75 cl'],
            ['name' => '50 cl'],
            ['name'=> 'Magnums (M)'],
            ['name'=> 'Double Magnums (dM)'],
            ['name'=> 'Impériale (Im)'],
            ['name'=> 'Bouteilles Vaudoises (70)'],

        ]);
    }
}
