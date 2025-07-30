<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangElektronik extends Model
{
    //
    protected $table = 'barang_elektronik';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori_id',
        'merk_id',
        'model',
        'tahun_pembelian',
        'kondisi',
        'jumlah',
        'lokasi_penyimpanan',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function merk()
    {
        return $this->belongsTo(MerkBarang::class, 'merk_id');
    }
}
