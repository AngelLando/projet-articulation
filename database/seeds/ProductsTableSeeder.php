<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['kind' => 'Vin rouge',
            'name' => 'Château Meyney',
            'year' => 2012,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Chateau-Meyney.png_7.png',
            'weight' => 75,
            'stock' => 100,
            'alcohol' => 13.5,
            'quotation' => 'WeinWisser : 18/20',
            'format_id' => 2,
            'type_id' => 1,
            'region_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin rouge',
            'name' => 'Château Cambon la Pelouse',
            'year' => 2015,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Chateau_Cambon_la_Pelouse.png_3.png',
            'weight' =>75,
            'stock' => 120,
            'alcohol' => 13.5,
            'quotation' => 'WeinWisser : 18/20',
            'format_id' => 1,
            'type_id' => 2,
            'region_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin mousseux',
            'name' => 'Champagne Charles Mignon 1er Cru "Premium Reserve Brut"',
            'year' => 2019,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Champagne_Charles_Mignon_Brut_Premium_Reserve_2.png.png',
            'weight' =>75,
            'stock' => 40,
            'alcohol'=> 12,
            'quotation' => '',
            'format_id' => 3,
            'type_id' => 2,
            'region_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin blanc',
            'name' => 'Château Romer du Hayot',
            'year' => 1947,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/c/h/chateau-romer-du-hayot.PNG.png',
            'weight' =>75,
            'stock' => 60,
            'alcohol' => 14,
            'quotation' => '',
            'format_id' => 1,
            'type_id' => 1,
            'region_id' => 1,
            'price_id'=> 1]
         ]);        
    }
}
