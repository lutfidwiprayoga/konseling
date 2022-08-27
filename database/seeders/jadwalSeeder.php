<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('jadwals')->insert([
            'nama' => 'Ramadhan',
            'nim' => '361955401067',
            'no_hp' => '082232969353',
            'topik' => 'Keuangan',
            'program_studi' => 'Teknik Informatika',
            'kelas' => 'tiga c',
            'waktu' => '12:21',
            'tanggal' => '23, juni 2000',
        ]);
    }
}
