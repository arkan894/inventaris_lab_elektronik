<x-layout :title="__('Inventaris Barang Elektronik')">
    <div class="mb-4">
        <h2 class="fw-bold text-primary mb-1">📦 Inventaris Barang Elektronik</h2>
        <p class="text-muted">Daftar barang elektronik yang tersedia di laboratorium</p>
        <hr>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Kondisi</th>
                            <th>Jumlah</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barang as $index => $b)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $b->nama_barang }}</td>
                            <td><span class="badge bg-secondary">{{ $b->kode_barang }}</span></td>
                            <td>{{ $b->kategori->nama_kategori }}</td>
                            <td>{{ $b->merk->nama_merk ?? '-' }}</td>
                            <td>
                                @if($b->kondisi === 'Baik')
                                <span class="badge bg-success">{{ $b->kondisi }}</span>
                                @elseif($b->kondisi === 'Rusak Ringan')
                                <span class="badge bg-warning text-dark">{{ $b->kondisi }}</span>
                                @else
                                <span class="badge bg-danger">{{ $b->kondisi }}</span>
                                @endif
                            </td>
                            <td>{{ $b->jumlah }}</td>
                            <td>{{ $b->lokasi_penyimpanan }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-muted py-3">Tidak ada data barang ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $barang->links() }}
    </div>
</x-layout>