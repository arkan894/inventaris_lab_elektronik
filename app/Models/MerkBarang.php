<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerkBarang extends Model
{
    //
    protected $table = 'merk_barang';
    public function barang()
    {
        return $this->hasMany(BarangElektronik::class, 'merk_id');
    }

    protected $fillable = [
        'nama_merk',
        'negara_asal',
    ];
}
