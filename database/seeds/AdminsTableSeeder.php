<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        for ($i=1; $i<=2; $i++) {
            DB::table('admins')->insert([
                'username' => 'Admin' .$i,
                'email' => 'email' . $i . '@heig-vd.ch',
                'password' => Hash::make('password' . $i),
                'admin' => true
            ]);
        }
    }
}
