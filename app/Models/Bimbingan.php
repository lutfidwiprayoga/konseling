<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['konseling_id', 'catatan', 'jadwal_id'];

    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'konseling_id', 'id');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }
}
