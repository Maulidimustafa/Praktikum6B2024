<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' =>'Admin1',
            'username' =>'adminNama',
            'password' => Hash::make('12345678'),
            'role' =>'Admin',
        ]);
    }
}
