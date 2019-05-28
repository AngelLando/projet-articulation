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
            ['name'=>'Aloxe-Corton'],
            ['name'=>'Barolo'],
            ['name'=>'Beaune'],
            ['name'=>'Chinon'],
            ['name'=>'Etna'],
            ['name'=>'Féchy']
        ]);
    }
}
