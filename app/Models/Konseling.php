<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'prodi_id',
        'kelas',
        'topik',
        'status_konseling'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class);
    }
}
