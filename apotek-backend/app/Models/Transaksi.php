<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tanggal',
        'total_harga',
        'metode_bayar',
        'keterangan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
