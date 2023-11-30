<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = [
            ['name' => 'Admin', 'email'=>'admin@gmail.com', 'role'=>'1', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Doctor', 'email'=>'doctor@gmail.com', 'role'=>'2', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Intern', 'email'=>'intern@gmail.com', 'role'=>'3', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Patient', 'email'=>'patient@gmail.com', 'role'=>'4', 'password' => bcrypt('123456'), 'status' =>'1'],
        ];

         foreach ($users as $key => $value) {
            User::create($value);
        }

    }
}
