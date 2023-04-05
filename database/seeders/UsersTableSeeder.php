<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        User::create([
            'name' => 'Agus Muhamad',
            'email' => 'agus.ibad33@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'Laki-laki',
            'active' => 1,
        ]);

        // tambahkan data user dummy lainnya sesuai kebutuhan

    }
}
