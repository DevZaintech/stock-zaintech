<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barcodes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // QR value unik
            $table->string('serial_number')->nullable(); // Boleh kosong dulu
            $table->string('nama_mesin')->nullable();     // Boleh kosong dulu
            $table->date('tanggal_terjual')->nullable();  // Boleh kosong dulu

            $table->unsignedBigInteger('id_user')->nullable(); // Kolom user, nullable dulu
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcodes');
    }
};
