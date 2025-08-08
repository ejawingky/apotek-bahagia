<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
