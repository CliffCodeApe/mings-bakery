<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BakerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => "mingsbakery",
            'email' => 'mingsbakery@example.com',
            'password' => bcrypt('123456'), // password
            'is_admin' => true,
            'phone_number' => '081234567890', // Indonesian-style phone number
            'email_verified_at' => now(),
        ]);

    }
}
