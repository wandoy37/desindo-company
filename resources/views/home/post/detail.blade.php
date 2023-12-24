@extends('home.layouts.app')

@section('title', $post->title)

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Post Details</h2>
                <ol>
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>Post Details</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <article class="blog-details">

                            <div class="post-img">
                                <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">
                                {{ $post->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>Desindo</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            datetime="2020-01-01">{{ $post->created_at->format('d M Y') }}</time></li>
                                </ul>
                            </div>

                            <div class="content">
                                {!! $post->content !!}
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Recent Posts</h3>

                                <div class="mt-3">

                                    @foreach ($recent_posts as $recent_post)
                                        <div class="post-item mt-3">
                                            <img src="{{ asset('thumbnail/' . $recent_post->thumbnail) }}" alt="">
                                            <div>
                                                <h4><a
                                                        href="{{ route('home.post.detail', $recent_post->slug) }}">{{ $recent_post->title }}</a>
                                                </h4>
                                                <time
                                                    datetime="2020-01-01">{{ $recent_post->created_at->format('d M Y') }}</time>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div><!-- End Blog Sidebar -->

                    </div>
                </div>

            </div>
        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
