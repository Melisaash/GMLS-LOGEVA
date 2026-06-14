<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
                'email' => 'admin@gugusmitigasibaksel.com'
            ],
            [
                'name' => 'Admin GMLS',
                'password' => bcrypt('admingmls')
            ]
        );

        // Hindari duplicate role
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}