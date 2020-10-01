<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<6; $i++)
            DB::table('users')->insert([
                'name' => 'User '.$i,
                'email' => "username$i@gmail.com",
                'password' => Hash::make('password'),
            ]);
    }
}
