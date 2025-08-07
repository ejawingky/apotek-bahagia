<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter',
        'tanggal',
        'catatan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function detail()
    {
        return $this->hasMany(ResepDetail::class);
    }
}
