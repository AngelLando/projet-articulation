<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();

        $json = File::get('database/data/regions.json');
        $data = json_decode($json);

        foreach($data as $appellation) {
            DB::table('regions')->insert([
                'name' => $appellation->name,
                'country_id' => $appellation->country_id,
            ]);
        }
    }
}
