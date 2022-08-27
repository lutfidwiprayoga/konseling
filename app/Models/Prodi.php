<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function konselings()
    {
        return $this->hasMany(Konseling::class);
    }
}
