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
            'description'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, sunt?',
        ]);
        Department::create([
            'name' => 'UI/UX',
            'description'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, sunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. In, dolore?',
        ]);
        Department::create([
            'name' => 'Digmar',
            'description'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, sunt?amet consectetur adipisicing elit. Ut, sunt?amet consectetur adipisicing elit. Ut, sunt?',
        ]);
        Department::create([
            'name' => 'Mobile',
            'description'=>'Lorem ipsum dolor,Lorem ipsum dolor,Lorem ipsum dolor,Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, sunt?amet consectetur adipisicing elit. Ut, sunt?amet consectetur adipisicing elit. Ut, sunt?',
        ]);
    }
}
