<?php

namespace App\Http\Controllers;

use App\Models\MerkBarang;
use Illuminate\Http\Request;

class MerkBarangController extends Controller
{
    public function index()
    {
        $merk = MerkBarang::latest()->paginate(10);
        return view('dashboard.merk.index', compact('merk'));
    }

    public function create()
    {
        return view('dashboard.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_merk' => 'required|unique:merk_barang,nama_merk|max:255',
            'negara_asal' => 'nullable|string|max:100',
        ]);

        MerkBarang::create($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan');
    }

    public function edit(MerkBarang $merk)
    {
        return view('dashboard.merk.edit', compact('merk'));
    }

    public function update(Request $request, MerkBarang $merk)
    {
        $request->validate([
            'nama_merk' => 'required|unique:merk_barang,nama_merk,' . $merk->id . '|max:255',
            'negara_asal' => 'nullable|string|max:100',
        ]);

        $merk->update($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui');
    }

    public function destroy(MerkBarang $merk)
    {
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus');
    }
}
