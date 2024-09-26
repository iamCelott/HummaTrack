<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Website',
        ]);
        Department::create([
            'name' => 'UI/UX',
        ]);
        Department::create([
            'name' => 'Digmar',
        ]);
        Department::create([
            'name' => 'Mobile',
        ]);
    }
}
