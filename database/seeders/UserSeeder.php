<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bncc.net',
            'password' => \Hash::make('saya_admin'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'joni',
            'email' => 'joni@bncc.net',
            'password' => \Hash::make('saya_joni'),
            'role' => 'member'
        ]);
    }
}
