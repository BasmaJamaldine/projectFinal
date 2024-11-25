<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            'name' =>"Basma Jamaldine",
            'phone' => "064578951",
            'gender' => "female",
            'email' => "basma@gmail.ma",
            'password' => Hash::make(147852369),
            'profile_image' => "user.jpg" ,
            'role' =>"admin",
     
        ]);
    }
}
