<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                📦 Inventaris Barang
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" 
                           href="{{ route('dashboard') }}">
                           Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barang.*') ? 'active fw-semibold' : '' }}" 
                           href="{{ route('barang.index') }}">
                           Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active fw-semibold' : '' }}" 
                           href="{{ route('kategori.index') }}">
                           Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('merk.*') ? 'active fw-semibold' : '' }}" 
                           href="{{ route('merk.index') }}">
                           Merk
                        </a>
                    </li>
                </ul>

                <!-- Form Pencarian -->
                <form class="d-flex me-3" role="search" method="GET" action="{{ route('barang.index') }}">
                    <input class="form-control me-2" type="search" name="search" 
                           value="{{ request('search') }}" placeholder="Cari barang..." aria-label="Search">
                    <button class="btn btn-light text-primary" type="submit">Cari</button>
                </form>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</div>
