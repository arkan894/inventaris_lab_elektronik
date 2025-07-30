<x-layouts.app :title="__('Tambah Merk')">
    <div class="mb-6">
        <flux:heading size="xl">Tambah Merk</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('merk.store') }}" method="POST">
        @csrf
        <flux:input label="Nama Merk" name="nama_merk" value="{{ old('nama_merk') }}" class="mb-3" />
        <flux:input label="Negara Asal" name="negara_asal" value="{{ old('negara_asal') }}" class="mb-3" />

        <flux:button type="submit" variant="primary">Simpan</flux:button>
        <flux:link href="{{ route('merk.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>