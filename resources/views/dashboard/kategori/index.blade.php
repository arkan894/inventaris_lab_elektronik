<x-layouts.app :title="__('Kategori Barang')">
    <div class="flex justify-between mb-6">
        <div>
            <flux:heading size="xl">Kategori Barang</flux:heading>
            <flux:subheading>Kelola kategori barang elektronik</flux:subheading>
        </div>
        <flux:button icon="plus">
        <flux:link href="{{ route('kategori.create') }}" variant="subtle">Tambah Kategori</flux:link>
        </flux:button>
    </div>

    @if(session('success'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif

    <form method="GET" action="{{ route('kategori.index') }}" class="mb-4 flex">
        <flux:input name="search" value="{{ request('search') }}" placeholder="Cari kategori..." class="w-1/3 mr-3" />
        <flux:button type="submit" variant="primary">Cari</flux:button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal text-center">
            <thead>
                <tr>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">No</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Nama Kategori</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $index => $k)
                <tr>
    <!-- No -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $index + 1 }}
        </p>
    </td>

    <!-- Nama Kategori -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 font-medium whitespace-no-wrap">
            {{ $k->nama_kategori }}
        </p>
    </td>

    <!-- Actions -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
        <flux:dropdown>
            <flux:button icon:trailing="chevron-down" size="sm">Actions</flux:button>

            <flux:menu>
                <flux:menu.item icon="pencil" href="{{ route('kategori.edit', $k->id) }}">
                    Edit
                </flux:menu.item>
                <flux:menu.item icon="trash" variant="danger"
                    onclick="event.preventDefault(); if(confirm('Yakin hapus kategori ini?')) document.getElementById('delete-form-{{ $k->id }}').submit();">
                    Hapus
                </flux:menu.item>

                <form id="delete-form-{{ $k->id }}" action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </flux:menu>
        </flux:dropdown>
    </td>
</tr>

                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $kategori->links() }}
        </div>
    </div>
</x-layouts.app>