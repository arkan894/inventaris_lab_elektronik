<x-layouts.app :title="__('Barang Elektronik')">
    <div class="flex justify-between mb-6">
        <div>
            <flux:heading size="xl">Barang Elektronik</flux:heading>
            <flux:subheading>Kelola data inventaris barang elektronik</flux:subheading>
        </div>
        <flux:button icon="plus">
        <flux:link href="{{ route('barang.create') }}" variant="subtle">Tambah Barang</flux:link>
        </flux:button>
    </div>

    @if(session('success'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif

    <form method="GET" action="{{ route('barang.index') }}" class="mb-4 flex">
        <flux:input name="search" value="{{ request('search') }}" placeholder="Cari barang..." class="w-1/3 mr-3" />
        <flux:button type="submit" variant="primary">Cari</flux:button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal text-center">
            <thead>
                <tr>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">No</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Kode</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Nama Barang</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Kategori</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Merk</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Kondisi</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Jumlah</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Lokasi Penyimpanan</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Keterangan</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $index => $b)
                <tr>
    <!-- No -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $index + 1 }}
        </p>
    </td>

    <!-- Kode Barang -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span class="text-gray-700">{{ $b->kode_barang }}</span>
    </td>

    <!-- Nama Barang -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 font-medium whitespace-no-wrap">
            {{ $b->nama_barang }}
        </p>
    </td>

    <!-- Kategori -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span class="text-gray-900">{{ $b->kategori->nama_kategori }}</span>
    </td>

    <!-- Merk -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span class="text-gray-900">{{ $b->merk->nama_merk ?? '-' }}</span>
    </td>

    <!-- Kondisi -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        @if($b->kondisi == 'Baik')
            <flux:badge variant="solid" color="lime">Baik</flux:badge>
        @elseif($b->kondisi == 'Rusak')
            <flux:badge variant="solid" color="red">Rusak</flux:badge>
        @else
            <flux:badge variant="solid" color="yellow">{{ $b->kondisi }}</flux:badge>
        @endif
    </td>

    <!-- Jumlah -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span class="text-gray-900">{{ $b->jumlah }}</span>
    </td>

    <!-- Lokasi Penyimpanan -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <span class="text-gray-900">{{ $b->lokasi_penyimpanan }}</span>
    </td>

    <!-- Keterangan -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900">{{ Str::limit($b->keterangan, 50) }}</p>
    </td>

    <!-- Actions -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
        <flux:dropdown>
            <flux:button icon:trailing="chevron-down" size="sm">Actions</flux:button>

            <flux:menu>
                <flux:menu.item icon="pencil" href="{{ route('barang.edit', $b->id) }}">
                    Edit
                </flux:menu.item>
                <flux:menu.item icon="trash" variant="danger"
                    onclick="event.preventDefault(); if(confirm('Yakin hapus barang ini?')) document.getElementById('delete-form-{{ $b->id }}').submit();">
                    Hapus
                </flux:menu.item>

                <form id="delete-form-{{ $b->id }}" action="{{ route('barang.destroy', $b->id) }}" method="POST" class="hidden">
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
            {{ $barang->links() }}
        </div>
    </div>
</x-layouts.app>