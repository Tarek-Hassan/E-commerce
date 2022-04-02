<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make(123456),
            'role'=>'admin',
        ]);
        User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make(123456),
            'role'=>'user',
        ]);
    }
}
