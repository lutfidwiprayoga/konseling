<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class MahasiswaImport implements WithCalculatedFormulas, ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                $user = User::create([
                    'nim' => $row[0],
                    'name' => $row[1],
                    'role_user' => 'mahasiswa',
                    'email_verified_at' => now(),
                    'password' => bcrypt($row[0]),
                ]);
                $mahasiswa = Mahasiswa::create([
                    'nim' => $row[0],
                    'nama' => $row[1],
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
