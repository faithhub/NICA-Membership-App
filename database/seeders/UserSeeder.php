<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
            [
                'surname' => Str::random(10),
                'other_name' => Str::random(10),
                'email' => 'admin@gmail.com',
                'phone_number' => Str::random(10),
                'password' => Hash::make('password'),
                'role' => 'Admin'
            ],
            [
                'surname' => Str::random(10),
                'other_name' => Str::random(10),
                'email' => 'adebayooluwadara@gmail.com',
                'phone_number' => Str::random(10),
                'password' => Hash::make('Oluwadara+1'),
                'role' => 'Member'
            ],
            // [
            //     'unique' => Str::random(10),
            //     'name' => Str::random(10),
            //     'email' => 'supervisor@gmail.com',
            //     'password' => Hash::make('password'),
            //     'role' => 'Supervisor'
            // ]
        ]);
    }
}
