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
            ['region_id' => 1, 'name' => 'Antinori', 'url_website' => 'https://www.antinori.it/it/'],
            ['region_id' => 1, 'name' => 'Giovanni Manzone', 'url_website' => 'http://www.manzonegiovanni.com/'],
            ['region_id' => 1, 'name' => 'Provins Valais', 'url_website' => '#'],
            ['region_id' => 1, 'name' => 'Artisans Vignerons d’Yvorne', 'url_website' => 'https://www.avy.ch/'],
            ['region_id' => 1, 'name' => 'Bodegas El Coto', 'url_website' => 'http://www.cotodeimaz.com/'],
            ['region_id' => 1, 'name' => 'Borsao', 'url_website' => 'https://bodegasborsao.com/']
        ]);
    }
}
