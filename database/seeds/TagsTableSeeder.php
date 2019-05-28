<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Coup de coeur'
        ]);
        DB::table('tags')->insert([
            'name' => 'Offre du mois'
        ]);
        DB::table('tags')->insert([
            'name' => 'Promotions'
        ]);
        DB::table('tags')->insert([
            'name' => 'Offres spéciales'
        ]);
    }
}
