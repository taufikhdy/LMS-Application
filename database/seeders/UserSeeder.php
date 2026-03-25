<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Miguel Johnson',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'email' => 'miguel@gmail.com'
        ]);

        User::create([
            'name' => 'Usep',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'email' => 'usep@gmail.com'
        ]);
    }
}
