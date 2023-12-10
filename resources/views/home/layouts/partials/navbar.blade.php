<nav id="navbar" class="navbar">
    <ul>
        <li><a href="{{ route('home.index') }}" class="{{ request()->segment(1) == '' ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('home.about') }}"
                class="{{ request()->segment(1) == 'tentang-kami' ? 'active' : '' }}">Tentang
                Kami</a></li>
        <li><a href="{{ route('home.proyek') }}"
                class="{{ request()->segment(1) == 'proyek' ? 'active' : '' }}">Projects</a></li>
        <li><a href="{{ route('home.post') }}" class="{{ request()->segment(1) == 'post' ? 'active' : '' }}">Postingan</a>
        </li>
        <li><a href="{{ route('home.kontak') }}"
                class="{{ request()->segment(1) == 'kontak' ? 'active' : '' }}">Kontak</a></li>
    </ul>
</nav><!-- .navbar -->
