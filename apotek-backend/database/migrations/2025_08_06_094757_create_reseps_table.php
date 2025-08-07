<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('resep_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resep_id')->constrained('reseps')->onDelete('cascade');
            $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('aturan_pakai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep_details');
    }
}

