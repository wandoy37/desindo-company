@extends('home.layouts.app')
@section('title', 'Beranda')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">DESINDO AGRI MANDIRI</h2>
                        <p data-aos="fade-up">
                            Kami adalah sebuah perusahaan kontraktor yang berkomitmen untuk memberikan solusi konstruksi
                            berkualitas tinggi dan inovatif dalam industri ini. Dengan pengalaman yang luas dan tim
                            profesional yang terampil, kami siap untuk menghadirkan proyek-proyek baja yang kokoh, efisien,
                            dan memenuhi standar tertinggi.
                        </p>
                        {{-- <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get
                            Started</a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url({{ asset('assets') }}/img/hero-carousel/hero-carousel-1.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url({{ asset('assets') }}/img/hero-carousel/hero-carousel-2.jpg)"></div>
            <div class="carousel-item"
                style="background-image: url({{ asset('assets') }}/img/hero-carousel/hero-carousel-3.jpg)"></div>
            <div class="carousel-item"
                style="background-image: url({{ asset('assets') }}/img/hero-carousel/hero-carousel-4.jpg)"></div>
            <div class="carousel-item"
                style="background-image: url({{ asset('assets') }}/img/hero-carousel/hero-carousel-5.jpg)"></div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-headset color-green flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-people color-pink flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Hard Workers</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>
        </section><!-- End Stats Counter Section -->

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Projects</h2>
                    <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel
                        architecto
                        accusamus fugit aut qui distinctio</p>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($project_categories as $category)
                            <li data-filter=".filter-{{ $category->title }}">{{ $category->title }}</li>
                        @endforeach
                    </ul><!-- End Projects Filters -->

                    <div class="row gy-4 portfolio-container d-flex " data-aos="fade-up" data-aos-delay="200">

                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $project->category->title }}">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset('projects/' . $project->image) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ $project->title }}</h4>
                                        <p>{{ $project->description }}</p>
                                        <a href="{{ asset('assets') }}/img/projects/remodeling-1.jpg" title="Remodeling 1"
                                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="project-details.html" title="More Details" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- End Projects Container -->

                </div>

            </div>
        </section><!-- End Our Projects Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up"">



                <div class=" section-header">
                    <h2>Recent Blog Posts</h2>
                    <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
                </div>

                <div class="row gy-5">
                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="img-fluid"
                                        alt="">
                                    <span class="post-date">{{ $post->created_at->format('d M Y') }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $post->title }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span class="ps-2">Desindo</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
        <!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
@endsection
