<x-layouts.app :title="__('Edit Kategori')">
    <div class="mb-6">
        <flux:heading size="xl">Edit Kategori</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf @method('PUT')
        <flux:input label="Nama Kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" class="mb-3" />
        <flux:textarea label="Deskripsi" name="deskripsi" class="mb-3">{{ old('deskripsi', $kategori->deskripsi) }}</flux:textarea>

        <flux:button type="submit" variant="primary">Update</flux:button>
        <flux:link href="{{ route('kategori.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>