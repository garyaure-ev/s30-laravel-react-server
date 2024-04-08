<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'test@example.com',
        ], ['full_name' => 'Test User',]);
        $user->syncRoles([4,2,1]);

        $user = User::firstOrCreate([
            'email' => 'test2@example.com',
        ], ['full_name' => 'Test2 User',]);
        $user->syncRoles([3,1]);
    }
}
