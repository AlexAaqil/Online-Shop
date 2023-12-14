<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $password = Hash::make('admin123');

        $adminRecords = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Administrator',
                'email'=> 'admin@gmail.com',
                'phone_number' => '+254 746 055 487',
                'password'=> $password,
                'profile_picture' => '',
                'is_admin' => 1,
            ]
        ];

        foreach ($adminRecords as $record) {
            User::create($record);
        }
    }
}
