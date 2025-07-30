<x-layouts.app :title="__('Edit Barang Elektronik')">
    <div class="mb-6">
        <flux:heading size="xl">Edit Barang Elektronik</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf @method('PUT')

        <flux:input label="Nama Barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="mb-3" />
        <flux:input label="Kode Barang" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="mb-3" />

        <flux:select label="Kategori" name="kategori_id" class="mb-3">
            @foreach($kategori as $k)
            <option value="{{ $k->id }}" {{ old('kategori_id', $barang->kategori_id) == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
            </option>
            @endforeach
        </flux:select>

        <flux:select label="Merk" name="merk_id" class="mb-3">
            <option value="">-- Pilih Merk --</option>
            @foreach($merk as $m)
            <option value="{{ $m->id }}" {{ old('merk_id', $barang->merk_id) == $m->id ? 'selected' : '' }}>
                {{ $m->nama_merk }}
            </option>
            @endforeach
        </flux:select>

        <flux:input label="Model" name="model" value="{{ old('model', $barang->model) }}" class="mb-3" />
        <flux:input type="number" label="Tahun Pembelian" name="tahun_pembelian" value="{{ old('tahun_pembelian', $barang->tahun_pembelian) }}" class="mb-3" />

        <flux:select label="Kondisi" name="kondisi" class="mb-3">
            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </flux:select>

        <flux:input type="number" label="Jumlah" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" class="mb-3" />
        <flux:input label="Lokasi Penyimpanan" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $barang->lokasi_penyimpanan) }}" class="mb-3" />
        <flux:textarea label="Keterangan" name="keterangan" class="mb-3">{{ old('keterangan', $barang->keterangan) }}</flux:textarea>

        <flux:button type="submit" variant="primary">Update</flux:button>
        <flux:link href="{{ route('barang.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>