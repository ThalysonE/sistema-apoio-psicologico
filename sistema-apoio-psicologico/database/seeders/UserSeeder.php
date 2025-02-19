<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User:: create([
            'name' => 'Thalyson',
            'email' =>'thalysonelione@gmail.com',
            'password'=> bcrypt('1234')
        ]
        );
    }
}
