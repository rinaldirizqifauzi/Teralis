<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
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
                'name' => 'Rinaldi Rizqi Fauzi',
                'email' => 'kylavesfar@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Lavesfar123'),
                'created_at' => date("Y:m:d H:i:s"),
                'updated_at' => date("Y:m:d H:i:s")
            ],
        ]);
    }
}
