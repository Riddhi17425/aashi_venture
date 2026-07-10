<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@aashiventure.com'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('admin123!'),
                'role'     => 1, // super_admin
            ]
        );
    }
}
