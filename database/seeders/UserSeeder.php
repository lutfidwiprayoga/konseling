<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Romadhon Priyono',
            'username' => 'romadhon_pr',
            'nim' => '361955401045',
            'role_user' => 'mahasiswa',
            'email' => 'romadhon@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
