<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
            $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_details');
    }
}

