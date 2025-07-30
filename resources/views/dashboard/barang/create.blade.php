<x-layouts.app :title="__('Tambah Barang Elektronik')">
    <div class="mb-6">
        <flux:heading size="xl">Tambah Barang Elektronik</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <flux:input label="Nama Barang" name="nama_barang" value="{{ old('nama_barang') }}" class="mb-3" />
        <flux:input label="Kode Barang" name="kode_barang" value="{{ old('kode_barang') }}" class="mb-3" />

        <flux:select label="Kategori" name="kategori_id" class="mb-3">
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
            <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
            </option>
            @endforeach
        </flux:select>

        <flux:select label="Merk" name="merk_id" class="mb-3">
            <option value="">-- Pilih Merk --</option>
            @foreach($merk as $m)
            <option value="{{ $m->id }}" {{ old('merk_id') == $m->id ? 'selected' : '' }}>
                {{ $m->nama_merk }}
            </option>
            @endforeach
        </flux:select>

        <flux:input label="Model" name="model" value="{{ old('model') }}" class="mb-3" />
        <flux:input type="number" label="Tahun Pembelian" name="tahun_pembelian" value="{{ old('tahun_pembelian') }}" class="mb-3" />

        <flux:select label="Kondisi" name="kondisi" class="mb-3">
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </flux:select>

        <flux:input type="number" label="Jumlah" name="jumlah" value="{{ old('jumlah') }}" class="mb-3" />
        <flux:input label="Lokasi Penyimpanan" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan') }}" class="mb-3" />
        <flux:textarea label="Keterangan" name="keterangan" class="mb-3">{{ old('keterangan') }}</flux:textarea>

        <flux:button type="submit" variant="primary">Simpan</flux:button>
        <flux:link href="{{ route('barang.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>