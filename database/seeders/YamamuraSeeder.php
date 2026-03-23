<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class YamamuraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 'yamamura',
            'user_name' => '山村 祐一',
            'password' => bcrypt('yamamura234'),
            'role_id' => 2,
            'status' => 1,
        ]);
    }
}
