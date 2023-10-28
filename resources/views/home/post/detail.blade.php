@extends('home.layouts.app')

@section('title', $post->title)

@section('content')
    <!-- One Section -->
    <section>
        <div class="container pt-4 mt-4">
            <div class="row align-items-center py-4 mt-4">
                <div class="col-md-12 my-4">
                    <h1 class="font-text-primary">{{ $post->title }}</h1>
                    <small class="fst-italic fw-bold">{{ $post->created_at->format('d M Y') }}</small>
                    <div class="position-relative mt-4"
                        style="height: 720px; background-image: url({{ asset('thumbnail') . '/' . $post->thumbnail }}); background-position: center; background-size: cover; border-radius: 20px;">
                    </div>
                    <article class="mt-4">
                        {!! $post->content !!}
                    </article>
                    <hr>
                    <a href="{{ route('home.post') }}">Postingan lainnya</a>
                </div>
            </div>
        </div>
    </section>


@endsection
