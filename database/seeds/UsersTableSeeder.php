<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        for ($i=1; $i<=3; $i++) {
            DB::table('users')->insert([
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@heig-vd.ch',
                'password' => Hash::make('password' . $i),
                'birth_date' => $i . '.' . $i . '.' . '200' . $i,
                'person_id' => $i
            ]);
        }
    }
}
