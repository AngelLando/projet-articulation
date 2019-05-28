<?php

use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_tag')->delete();
        for ($i=1; $i<=4; $i++) {
            DB::table('product_tag')->insert([
                'product_id'=> $i,
                'tag_id'=> $i
            ]);
        }
    }
}
