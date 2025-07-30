<x-layouts.app :title="__('Tambah Kategori')">
    <div class="mb-6">
        <flux:heading size="xl">Tambah Kategori</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <flux:input label="Nama Kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" class="mb-3" />
        <flux:textarea label="Deskripsi" name="deskripsi" class="mb-3">{{ old('deskripsi') }}</flux:textarea>

        <flux:button type="submit" variant="primary">Simpan</flux:button>
        <flux:link href="{{ route('kategori.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>