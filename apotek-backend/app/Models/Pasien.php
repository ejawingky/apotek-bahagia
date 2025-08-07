<?php 

// app/Models/Pasien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
    ];

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
