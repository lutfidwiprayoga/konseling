<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->delete();

        $periodes = array(
            array('nama' => 'D4 Teknologi Rekayasa Perangkat Lunak'),
            array('nama' => 'D4 Teknologi Pengolahan Hasil Ternak'),
            array('nama' => 'D4 Teknologi Rekayasa Manufaktur'),
            array('nama' => 'D4 Teknologi Rekayasa Komputer'),
            array('nama' => 'D4 Bisnis Digital'),
            array('nama' => 'D4 Manajemen Bisnis Pariwisata'),
            array('nama' => 'D4 Agribisnis'),
            array('nama' => 'D4 Teknik Manufaktur Kapal'),
            array('nama' => 'D3 Teknik Informatika'),
            array('nama' => 'D3 Teknik Sipil'),
            array('nama' => 'D3 Teknik Mesin'),
        );
        DB::table('prodis')->insert($periodes);
    }
}
