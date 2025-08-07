<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'obat_id',
        'jumlah',
        'tanggal_masuk',
        'tanggal_kadaluarsa',
        'supplier_id'
    ];

    // Relasi ke Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    // Relasi ke Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}