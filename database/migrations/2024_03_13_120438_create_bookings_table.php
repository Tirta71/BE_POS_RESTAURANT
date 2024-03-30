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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('ID_Booking');
            $table->unsignedBigInteger('ID_Meja');
            $table->unsignedBigInteger('ID_Pelanggan');
            $table->dateTime('Waktu_Booking');
            $table->dateTime('Waktu_Kedatangan');
            $table->enum('Status', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->foreign('ID_Meja')->references('ID_Meja')->on('mejas');
            $table->foreign('ID_Pelanggan')->references('ID_Pelanggan')->on('pelanggans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
