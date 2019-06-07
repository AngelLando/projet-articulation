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
        DB::table('appellations')->delete();

        $json = File::get('database/data/appellations.json');
        $data = json_decode($json);

        foreach($data as $appellation) {
            DB::table('appellations')->insert([
               'name' => $appellation->name
            ]);
        }
    }
}
