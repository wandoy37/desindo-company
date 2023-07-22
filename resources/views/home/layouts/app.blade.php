<!doctype html>
<html lang="en">

<head>
    <title>DESINDO - @yield('title')</title>
    <link rel="icon" href="{{ asset('assets') }}/img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/style.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/5983388006.js" crossorigin="anonymous"></script>
    <!-- Google Fonts Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,300&display=swap"
        rel="stylesheet">
    <!-- /Google Fonts Montserrat -->

    <style>
        /* Custom */
        .grad1 img {
            -webkit-mask-image: linear-gradient(to top, transparent 0%, black 75%);
            mask-image: linear-gradient(to top, transparent 0%, black 75%);
        }

        .g-0>[class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    @include('home.layouts.partials.navbar')

    @yield('content')

    <!-- Footer -->
    <section id="footer" style="margin-top: 60px;">
        <div class="container px-4">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <a class="font-text-secondary text-decoration-none text-white" href="{{ route('index') }}">
                        <img src="{{ asset('assets') }}/img/logo.png" class="img-fluid float-start" width="75px">
                        <span class="font-text-second-footer">FORESTRY CONSULTANT</span>
                        <h2 class="font-text-primary-footer">PT DESINDO AGRI MANDIRI</h2>
                    </a>
                    <div class="text-brand-footer">
                        <p>Jl. PM Noor Bumi Sempaja Ruko Griya Niaga 3 AL/AM Kota Samarinda Provinsi Kalimantan Timur,
                            75119</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('index') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('post') }}">Postingan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('proyek') }}">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm pt-4 mt-4">
                    <hr>
                    <span class="text-white fst-bold">Copyright &copy; Samarinda Computing <?php echo date('Y'); ?></span>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
