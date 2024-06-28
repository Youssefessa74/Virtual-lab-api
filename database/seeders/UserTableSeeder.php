<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();
        User::create([
            'name' =>'Youssef Eissa',
            'email' => 'youssefessa2255@gmail.com',
            'password'=>Hash::make('password'),
        ]);
        User::create([
            'name' =>'Fayrouz Eissa',
            'email' => 'fayrouzessa2255@gmail.com',
            'password'=>Hash::make('password'),
        ]);

    User::create([
        'name' =>'fawzia Eissa',
        'email' => 'fawziaessa2255@gmail.com',
        'password'=>Hash::make('password'),
    ]);

    User::create([
        'name' =>'User',
        'email' => 'user@gmail.com',
        'password'=>Hash::make('password'),
    ]);

    }
}
