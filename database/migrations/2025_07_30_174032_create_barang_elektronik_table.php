<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barang_elektronik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->unique();
            $table->string('kode_barang')->unique();
            $table->foreignId('kategori_id')->constrained('kategori_barang')->cascadeOnDelete();
            $table->foreignId('merk_id')->nullable()->constrained('merk_barang')->nullOnDelete();
            $table->string('model')->nullable();
            $table->integer('tahun_pembelian');
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->integer('jumlah');
            $table->string('lokasi_penyimpanan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_elektronik');
    }
};
