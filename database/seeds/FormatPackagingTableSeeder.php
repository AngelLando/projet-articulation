<?php

use Illuminate\Database\Seeder;

class FormatPackagingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('format_packaging')->delete();
        for ($i=1; $i<=5; $i++) {
            DB::table('format_packaging')->insert([
                'format_id' => $i,
                'packaging_id' => $i
            ]);
        }
    }
}
