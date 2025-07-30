<x-layouts.app :title="__('Edit Merk')">
    <div class="mb-6">
        <flux:heading size="xl">Edit Merk</flux:heading>
        <flux:separator />
    </div>

    <form action="{{ route('merk.update', $merk->id) }}" method="POST">
        @csrf @method('PUT')
        <flux:input label="Nama Merk" name="nama_merk" value="{{ old('nama_merk', $merk->nama_merk) }}" class="mb-3" />
        <flux:input label="Negara Asal" name="negara_asal" value="{{ old('negara_asal', $merk->negara_asal) }}" class="mb-3" />

        <flux:button type="submit" variant="primary">Update</flux:button>
        <flux:link href="{{ route('merk.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
    </form>
</x-layouts.app>