<div class="navbar">
    <div class="navbar-left">
        <a class="title" href="{{ route('dashboard') }}">NusaFood</a>
        <a class="navbarh3 {{ request()->routeIs('peta.penyebaran') ? 'active' : '' }}"
            href="{{ route('peta.penyebaran') }}">Peta Penyebaran</a>
        <a class="navbarh3 {{ request()->routeIs('laporan') ? 'active' : '' }}" href="{{ route('laporan') }}">Laporan
            Program</a>
        <a class="navbarh3 {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak Kami/Lapor</a>
    </div>
    <div class="navbar-right">
        <a href="login.html">Login</a>
    </div>
</div>