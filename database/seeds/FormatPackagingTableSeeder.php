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
            DB::table('format_packaging')->insert([
                //Bois 1
                ['format_id' => 1,
                'packaging_id' => 1],
                ['format_id' => 2,
                    'packaging_id' => 1],
                ['format_id' => 4,
                    'packaging_id' => 1],
                ['format_id' => 6,
                    'packaging_id' => 1],

                // Bois 3
                ['format_id' => 5,
                    'packaging_id' => 3],

                // Bois 6
                ['format_id' => 2,
                    'packaging_id' => 5],
                ['format_id' => 4,
                    'packaging_id' => 5],

                // Bois 12
                ['format_id' => 2,
                    'packaging_id' => 7],
                ['format_id' => 1,
                    'packaging_id' => 7],

                // Carton 1
                ['format_id' => 1,
                    'packaging_id' => 2],
                ['format_id' => 2,
                    'packaging_id' => 2],

                // Carton 3
                ['format_id' => 2,
                    'packaging_id' => 4],

                // Carton 6
                ['format_id' => 2,
                    'packaging_id' => 6],

                // Carton 12
                ['format_id' => 2,
                    'packaging_id' => 8],
                ['format_id' => 1,
                    'packaging_id' => 8],
                ['format_id' => 7,
                    'packaging_id' => 5],

                // Carton 24
                ['format_id' => 1,
                    'packaging_id' => 10],
            ]);

    }
}
