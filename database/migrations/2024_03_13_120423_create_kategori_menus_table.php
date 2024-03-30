<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('kategori_menus', function (Blueprint $table) {
            $table->id('ID_Kategori');
            $table->string('Nama_Kategori');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('kategori_menus');
    }
};
