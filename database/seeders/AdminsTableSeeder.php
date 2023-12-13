<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');

        $adminRecords = [
            [
                'type' => 'Admin',
                'first_name' => 'Admin',
                'last_name' => 'Administrator',
                'email'=> 'admin@gmail.com',
                'phone_number' => '+254 746 055 487',
                'password'=> $password,
                'image' => '',
            ]
        ];

        foreach ($adminRecords as $record) {
            Admin::create($record);
        }
    }
}
