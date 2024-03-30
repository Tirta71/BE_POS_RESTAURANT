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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('ID_Menu');
            $table->string('Nama_Menu');
            $table->double('Harga');
            $table->unsignedBigInteger('ID_Kategori');
            $table->foreign('ID_Kategori')->references('ID_Kategori')->on('kategori_menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
