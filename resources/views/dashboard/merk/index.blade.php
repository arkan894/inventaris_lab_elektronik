<x-layouts.app :title="__('Merk Barang')">
    <div class="flex justify-between mb-6">
        <div>
            <flux:heading size="xl">Merk Barang</flux:heading>
            <flux:subheading>Kelola merk barang elektronik</flux:subheading>
        </div>
        <flux:button icon=plus>
        <flux:link href="{{ route('merk.create') }}" variant="subtle">Tambah Merk</flux:link>
        </flux:button>
    </div>

    @if(session('success'))
    <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif

    <form method="GET" action="{{ route('merk.index') }}" class="mb-4 flex">
        <flux:input name="search" value="{{ request('search') }}" placeholder="Cari merk..." class="w-1/3 mr-3" />
        <flux:button type="submit" variant="primary">Cari</flux:button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal text-center">
            <thead>
                <tr>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">No</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Nama Merk</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Negara Asal</th>
                    <th class="px-4 py-3 bg-gray-100 text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($merk as $index => $m)
                <tr>
    <!-- No -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $index + 1 }}
        </p>
    </td>

    <!-- Nama Merk -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 font-medium whitespace-no-wrap">
            {{ $m->nama_merk }}
        </p>
    </td>

    <!-- Negara Asal -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
        <p class="text-gray-900 whitespace-no-wrap">
            {{ $m->negara_asal }}
        </p>

    <!-- Actions -->
    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
        <flux:dropdown>
            <flux:button icon:trailing="chevron-down" size="sm">Actions</flux:button>

            <flux:menu>
                <flux:menu.item icon="pencil" href="{{ route('merk.edit', $m->id) }}">Edit</flux:menu.item>
                <flux:menu.item icon="trash" variant="danger"
                    onclick="event.preventDefault(); if(confirm('Yakin hapus merk ini?')) document.getElementById('delete-form-{{ $m->id }}').submit();">
                    Hapus
                </flux:menu.item>

                <form id="delete-form-{{ $m->id }}" action="{{ route('merk.destroy', $m->id) }}" method="POST" class="hidden">
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
            {{ $merk->links() }}
        </div>
    </div>
</x-layouts.app>