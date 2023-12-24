@extends('home.layouts.app')
@section('title', 'Tentang Kami')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets') }}/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>TENTANG KAMI</h2>
                <ol>
                    <li><a href="{{ route('home.index') }}">BERANDA</a></li>
                    <li>TENTANG KAMI</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img" style="background-image: url({{ asset('about/' . $abouts->image) }});">
                    </div>

                    <div class="col-lg-7">
                        <h2>TENTANG KAMI</h2>
                        <div class="our-story">
                            {!! $abouts->content !!}

                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="{{ $abouts->youtube }}" class="glightbox stretched-link">Watch
                                    Video</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
@endsection
