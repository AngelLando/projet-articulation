<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            ['country_id' => 1, 'name' => 'Antinori', 'url_website' => 'https://www.antinori.it/it/'],
            ['country_id' => 1, 'name' => 'Giovanni Manzone', 'url_website' => 'http://www.manzonegiovanni.com/'],
            ['country_id' => 2, 'name' => 'Provins Valais', 'url_website' => '#'],
            ['country_id' => 2, 'name' => 'Artisans Vignerons d’Yvorne', 'url_website' => 'https://www.avy.ch/'],
            ['country_id' => 3, 'name' => 'Bodegas El Coto', 'url_website' => 'http://www.cotodeimaz.com/'],
            ['country_id' => 3, 'name' => 'Borsao', 'url_website' => 'https://bodegasborsao.com/']
        ]);
    }
}
