<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['konseling_id', 'konselor_id', 'waktu', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'konselor_id', 'id');
    }
    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'konseling_id', 'id');
    }
    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class);
    }
}
