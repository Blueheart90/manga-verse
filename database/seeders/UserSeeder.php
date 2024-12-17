<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jesus David',
            'email' => 'chuchober@hotmail.com',
            'username' => 'blueheart',
            'password' => Hash::make('123456'),
            'email_verified_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'Jacobo',
            'email' => 'jacobo@hotmail.com',
            'username' => 'jacobo2010',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Gabriel',
            'email' => 'gabriel@hotmail.com',
            'username' => 'gabriel_roblox',
            'password' => Hash::make('123456'),
        ]);
    }
}
