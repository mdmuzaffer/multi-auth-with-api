<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Doctor'],
            ['name' => 'Intern'],
            ['name' => 'Patient'],
        ];
         foreach ($roles as $key => $value) {
            Role::create($value);
        }

    }
}
