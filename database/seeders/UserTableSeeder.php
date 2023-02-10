<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'phone'=>'017255686531',
            'password'=>bcrypt('12345'),
            'role'=>'admin'

        ]);
    }
}
