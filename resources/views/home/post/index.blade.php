@extends('home.layouts.app')
@section('title', 'Postingan')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets') }}/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Blog</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Blog</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 posts-list">

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

                                    <a href="{{ route('home.post.detail', $post->slug) }}"
                                        class="readmore stretched-link"><span>Read
                                            More</span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div><!-- End blog posts list -->

                {{ $posts->links('vendor.pagination.bootstrap-4') }}

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
