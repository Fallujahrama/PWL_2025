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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); //membuat kolom id pada tabel
            $table->string('name'); //membuat kolom name dengan tipe data string
            $table->string('description'); //membuat kolom description dengan tipe data string untuk mengisi deskripsi item
            $table->timestamps(); //membuat kolom timestamps untuk menyimpan 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan data.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
