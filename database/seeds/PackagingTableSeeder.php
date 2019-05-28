<?php

use Illuminate\Database\Seeder;

class PackagingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packagings')->delete();
        $capacity = [1,3,6,12,24];

        for ($i=0; $i<=sizeof($capacity)-1; $i++) {
            DB::table('packagings')->insert([
                ['type' => 'Caisse en bois', 'capacity' => $capacity[$i]],
                ['type' => 'Carton', 'capacity' => $capacity[$i]]
            ]);
        }
    }
}
