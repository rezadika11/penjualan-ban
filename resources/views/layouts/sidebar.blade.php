<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            {{-- <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span> --}}
            <span>SIP-Ban</span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            {{-- <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span> --}}
            <span>SIP-Ban</span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard*') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="menu-title"><span data-key="t-menu">Master</span></li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('kategori*') ? 'active' : '' }}"
                        href="{{ route('kategori.index') }}">
                        <i class='bx bxs-cube'></i><span data-key="t-kategori">Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('produk*') ? 'active' : '' }}"
                        href="{{ route('produk.index') }}">
                        <i class="ri-shopping-bag-line"></i> <span data-key="t-produk">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('supplier*') ? 'active' : '' }}"
                        href="{{ route('supplier.index') }}">
                        <i class="ri-truck-line"></i> <span data-key="t-suplier">Supplier</span>
                    </a>
                </li>
                {{-- <li class="menu-title"><span data-key="t-trans">Transaksi</span></li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('pengeluaran*') ? 'active' : '' }}"
                        href="{{ route('pengeluaran.index') }}">
                        <i class='bx bx-money'></i> <span data-key="t-suplier">Pengeluaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ Request::is('pembelian*') ? 'active' : '' }}"
                        href="{{ route('pembelian.index') }}">
                        <i class="ri-download-2-fill"></i> <span data-key="t-pembelian">Pembelian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('penjualan*') ? 'active' : '' }}"
                        href="{{ route('penjualan.index') }}">
                        <i class="ri-upload-2-fill"></i> <span data-key="t-penjualan">Penjualan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('transaksi*') ? 'active' : '' }}"
                        href="{{ route('transaksi.index') }}">
                        <i class="ri-shopping-cart-2-line"></i> <span data-key="t-lama">Transaksi Aktif</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('transaksi/baru*') ? 'active' : '' }}"
                        href="{{ route('transaksi.baru') }}">
                        <i class="ri-shopping-cart-2-line"></i> <span data-key="t-baru">Transaksi Baru</span>
                    </a>
                </li>
                {{-- <li class="menu-title"><span data-key="t-trans">REPORT</span></li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('laporan*') ? 'active' : '' }}"
                        href="{{ route('laporan.index') }}">
                        <i class='bx bxs-file-pdf'></i> <span data-key="t-laporan">Laporan</span>
                    </a>
                </li>
                {{-- <li class="menu-title"><span data-key="t-trans">SETTINGS</span></li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="">
                        <i class="ri-user-settings-line"></i> <span data-key="t-user">User</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('setting*') ? 'active' : '' }}"
                        href="{{ route('setting.index') }}">
                        <i class="ri-settings-5-line"></i> <span data-key="t-pengaturan">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
