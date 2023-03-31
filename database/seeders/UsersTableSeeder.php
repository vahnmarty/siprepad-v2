<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [ 'email' => 'admin@app.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password')
            ]
        );

        $admin->assignRole('admin');

        $user1 = User::firstOrCreate(
            [ 'email' => 'user1@app.com'],
            [
                'name' => 'User S1',
                'password' => bcrypt('password')
            ]
        );

        $user1->assignRole('user');

        $user2 = User::firstOrCreate(
            [ 'email' => 'user2@app.com'],
            [
                'name' => 'User S2',
                'password' => bcrypt('password')
            ]
        );

        $user2->assignRole('user');


        $user3 = User::firstOrCreate(
            [ 'email' => 'user3@app.com'],
            [
                'name' => 'User S3',
                'password' => bcrypt('password')
            ]
        );

        $user3->assignRole('user');
    }
}
