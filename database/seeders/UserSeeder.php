<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'phone_number' => '082340966694',
            'photo_profile' => "https://ui-avatars.com/api/?name=admin&background=random"
        ])->assignRole('admin');

        // User::create([
        //     'name' => 'pemin',
        //     'email' => 'pemin@gmail.com',
        //     'password' => '12345678',
        //     'phone_number' => '082340956694',
        //     'photo_profile' => "https://ui-avatars.com/api/?name=admin&background=random"
        // ])->assignRole('admin');

        User::create([
            'name' => 'Dharma Chandra Viriya',
            'email' => 'chandra@gmail.com',
            'password' => '12345678',
            'phone_number' => '12345678',
            'photo_profile' => "https://ui-avatars.com/api/?name=chandra&background=random"
        ])->assignRole('member');

        User::create([
            'name' => 'Ridoq Taufik Maulana',
            'email' => 'ridoq@gmail.com',
            'password' => '12345678',
            'phone_number' => '123456781',
            'photo_profile' => "https://ui-avatars.com/api/?name=ridoq&background=random"
        ])->assignRole('member');

        User::create([
            'name' => 'Dirwa Sanami Islam',
            'email' => 'dirwa@gmail.com',
            'password' => '12345678',
            'phone_number' => '12345678678132',
            'photo_profile' => "https://ui-avatars.com/api/?name=dirwa&background=random"
        ])->assignRole('member');

        User::create([
            'name' => 'Juhanda Azril Kamal',
            'email' => 'juhan@gmail.com',
            'password' => '12345678',
            'phone_number' => '123456786781131',
            'photo_profile' => "https://ui-avatars.com/api/?name=juhan&background=random"
        ])->assignRole('member');

        User::create([
            'name' => 'Chandra Kusuma',
            'email' => 'kusuma@gmail.com',
            'password' => '12345678',
            'phone_number' => '1234567863278131',
            'photo_profile' => "https://ui-avatars.com/api/?name=kusuma&background=random"
        ])->assignRole('member');
    }
}
