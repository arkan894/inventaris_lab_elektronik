<?php

namespace App\Http\Controllers;

use App\Models\BarangElektronik;
use App\Models\KategoriBarang;
use App\Models\MerkBarang;
use Illuminate\Http\Request;

class BarangElektronikController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $barang = BarangElektronik::with(['kategori', 'merk'])
            ->when($search, function ($query, $search) {
                $query->where('nama_barang', 'like', "%$search%")
                    ->orWhere('kode_barang', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('dashboard.barang.index', compact('barang', 'search'));
    }

    public function create()
    {
        $kategori = KategoriBarang::all();
        $merk = MerkBarang::all();
        return view('dashboard.barang.create', compact('kategori', 'merk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik,nama_barang|max:255',
            'kode_barang' => 'required|unique:barang_elektronik,kode_barang|max:255',
            'kategori_id' => 'required|exists:kategori_barang,id',
            'merk_id' => 'nullable|exists:merk_barang,id',
            'model' => 'nullable|string|max:255',
            'tahun_pembelian' => 'required|integer|min:1900|max:' . date('Y'),
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        BarangElektronik::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(BarangElektronik $barang)
    {
        $kategori = KategoriBarang::all();
        $merk = MerkBarang::all();
        return view('dashboard.barang.edit', compact('barang', 'kategori', 'merk'));
    }

    public function update(Request $request, BarangElektronik $barang)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik,nama_barang,' . $barang->id . '|max:255',
            'kode_barang' => 'required|unique:barang_elektronik,kode_barang,' . $barang->id . '|max:255',
            'kategori_id' => 'required|exists:kategori_barang,id',
            'merk_id' => 'nullable|exists:merk_barang,id',
            'model' => 'nullable|string|max:255',
            'tahun_pembelian' => 'required|integer|min:1900|max:' . date('Y'),
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(BarangElektronik $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
