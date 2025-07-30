<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::latest()->paginate(10);
        return view('dashboard.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barang,nama_kategori|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriBarang::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(KategoriBarang $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, KategoriBarang $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barang,nama_kategori,' . $kategori->id . '|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(KategoriBarang $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
