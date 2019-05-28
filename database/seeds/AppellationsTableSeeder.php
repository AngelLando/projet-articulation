<?php

use Illuminate\Database\Seeder;

class AppellationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appellations')->insert([
            'name'=>'Aloxe-Corton'
        ]);
        DB::table('appellations')->insert([
            'name'=>'Barolo'
        ]);
        DB::table('appellations')->insert([
            'name'=>'Beaune'
        ]);
        DB::table('appellations')->insert([
            'name'=>'Chinon'
        ]);
        DB::table('appellations')->insert([
            'name'=>'Etna'
        ]);
        DB::table('appellations')->insert([
            'name'=>'Féchy'
        ]);
    }
}
