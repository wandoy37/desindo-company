<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-yellow fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('assets') }}/img/logo.png" class="img-fluid" width="50px">
                DESINDO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}"
                            href="{{ route('home.index') }}">
                            <i class="fas fa-home"></i>
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'post' ? 'active' : '' }}"
                            href="{{ route('home.post') }}">Postingan</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'proyek' ? 'active' : '' }}"
                            href="{{ route('home.proyek') }}">Project</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link {{ request()->segment(1) == 'about-me' ? 'active' : '' }}"
                            href="{{ route('home.about') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
