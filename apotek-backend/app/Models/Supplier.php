<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'no_telp',
        'email'
    ];

    // Relasi ke Pembelian
    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
