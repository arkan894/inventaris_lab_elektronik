<?php

namespace App\Http\Controllers;

use App\Models\BarangElektronik;
use Illuminate\Http\Request;

class WebInventarisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $barang = BarangElektronik::with(['kategori', 'merk'])
            ->when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', "%$search%")
                    ->orWhere('kode_barang', 'like', "%$search%");
            })
            ->orderBy('nama_barang')
            ->paginate(10);

        return view('web.inventaris', compact('barang'));
    }
}
