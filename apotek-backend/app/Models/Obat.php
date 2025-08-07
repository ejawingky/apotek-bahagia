<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'satuan',
        'harga',
        'minimal_stok'
    ];

    // Relasi ke stok_obats
    public function stok()
    {
        return $this->hasMany(StokObat::class, 'obat_id');
    }

    // Relasi ke resep_details
    public function resepDetails()
    {
        return $this->hasMany(ResepDetail::class, 'obat_id');
    }

    // Relasi ke detail_transaksis
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'obat_id');
    }
}