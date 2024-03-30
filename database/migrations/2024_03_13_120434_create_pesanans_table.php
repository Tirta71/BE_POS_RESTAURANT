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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('ID_Pesanan');
            $table->unsignedBigInteger('ID_Pelanggan');
            $table->string('status')->default('proses');
            $table->timestamps();

            $table->foreign('ID_Pelanggan')->references('ID_Pelanggan')->on('pelanggans');
        });

        Schema::create('menu_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Pesanan');
            $table->unsignedBigInteger('ID_Menu');
            $table->integer('Jumlah');
            $table->double('Harga'); // Harga menu dikalika jumlah
            $table->timestamps();

            $table->foreign('ID_Pesanan')->references('ID_Pesanan')->on('pesanans')->onDelete('cascade');
            $table->foreign('ID_Menu')->references('ID_Menu')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_pesanans');
        Schema::dropIfExists('pesanans');
    }
};
