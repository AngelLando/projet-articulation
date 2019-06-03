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
            'description' => "Le Château Meyney fut, à ses origines, en 1662, un couvent. Qu'il vienne de St-Julien, de Pauillac ou de St-Estèphe, le visiteur aperçoit, sur sa droite, presque sur les rives de la Gironde, un ensemble de belles constructions qui évoque un cloître. Le vignoble s'étend sur 51 hectares. Celui-ci se compose de belles croupes argilo-graveleuses, et c'est peut-être le voisinage du fleuve, qui donne au paysage une sorte de grandeur et de sérénité. Le domaine demeura pendant plusieurs générations dans la même famille, avant d'échoir, en 1919, à Désiré Cordier.",
            'year' => 2012,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Chateau-Meyney.png_7.png',
            'weight' => 75,
            'stock' => 100,
            'alcohol' => 13.5,
            'quotation' => 'WeinWisser : 18/20',
            'slug' => str_slug('Château Meyney'),
            'format_id' => 2,
            'type_id' => 1,
            'supplier_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin rouge',
            'name' => 'Château Cambon la Pelouse',
            'description' => "Figurant parmi les plus anciens châteaux du Médoc, la propriété expédie ses vins en Angleterre dès le XVIIe siècle et en Hollande à partir du XVIIIe siècle. Sous la révolution, le château a appartenu à la famille de Cambon, à qui il doit son nom. Le vignoble, entièrement décimé lors du gel de 1956 et partiellement transformé alors en champ céréalier, a été replanté en 1975 et a une moyenne d’âge d’une trentaine d’années.",
            'year' => 2015,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Chateau_Cambon_la_Pelouse.png_3.png',
            'weight' =>75,
            'stock' => 120,
            'alcohol' => 13.5,
            'quotation' => 'WeinWisser : 18/20',
            'slug' => str_slug('Château Cambon la Pelouse'),
            'format_id' => 1,
            'type_id' => 2,
            'supplier_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin mousseux',
            'name' => 'Champagne Charles Mignon 1er Cru "Premium Reserve Brut"',
            'description' => "La maison de Champagne Charles Mignon est l'une des rares maisons à caractère familial à être membre de l'Union de Maisons de Champagne. Quatre générations ont perpétué avec passion et savoir-faire les plus nobles traditions champenoises. Bruno, l'arrière-petit-fils, a repris le flambeau en 1995.",
            'year' => 2019,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/C/h/Champagne_Charles_Mignon_Brut_Premium_Reserve_2.png.png',
            'weight' =>75,
            'stock' => 40,
            'alcohol'=> 12,
            'quotation' => '',
            'slug' => str_slug('Champagne Charles Mignon 1er Cru "Premium Reserve Brut"'),
            'format_id' => 3,
            'type_id' => 2,
            'supplier_id' => 1,
            'price_id'=> 1],

            ['kind' => 'Vin blanc',
            'name' => 'Château Romer du Hayot',
            'description' => '',
            'year' => 1947,
            'path_image' => 'https://www.gazzar.ch/media/catalog/product/cache/1/thumbnail/80x322/9df78eab33525d08d6e5fb8d27136e95/c/h/chateau-romer-du-hayot.PNG.png',
            'weight' =>75,
            'stock' => 60,
            'alcohol' => 14,
            'quotation' => '',
            'slug' => str_slug('Château Romer du Hayot'),
            'format_id' => 1,
            'type_id' => 1,
            'supplier_id' => 1,
            'price_id'=> 1]
         ]);        
    }
}
