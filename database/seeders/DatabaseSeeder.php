<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::create([
            'name' => 'admin',                 // Set the name to 'admin'
            'password' => bcrypt('admin'),    // Set the password to 'admin', hashed
        ]);
    }
}
