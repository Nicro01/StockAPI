<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = new User();
        $admin_user->name = 'Admin';
        $admin_user->email = 'nicolasmagalhaes2003@gmail.com';
        $admin_user->username = 'nicro';
        $admin_user->password = Hash::make('0000');
        $admin_user->role = 'admin';
        $admin_user->save();
    }
}
