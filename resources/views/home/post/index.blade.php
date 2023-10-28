@extends('home.layouts.app')
@section('title', 'Postingan')

@section('content')
    <!-- One Section -->
    {{-- <section>
        <div class="container pt-4 mt-4">
            <div class="row align-items-center py-4 mt-4">
                <div class="col-md-12 my-4">
                    <span class="font-text-second">Postingan</span>
                    <div class="input-group my-2">
                        <input type="text" class="form-control" placeholder="Cari Postingan ..">
                        <button class="btn btn-warning" type="button">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 my-2">
                        <div style="box-shadow: 0 0  20px #ddd;">
                            <div class="position-relative"
                                style="height: 320px; background-image: url({{ asset('thumbnail') . '/' . $post->thumbnail }}); background-position: center; background-size: cover;">
                                <div class="position-absolute px-3 py-4"
                                    style="background: rgba(0, 0, 0, .5); right: 0; bottom: 0; left: 0;">
                                    <h3 class="h6"><a href="{{ route('home.post.detail', $post->slug) }}"
                                            class="text-white text-decoration-none text-capitalize"
                                            style="line-height: 1.6; font-weight:700;">{{ Str::limit($post->title, 40) }}</a>
                                    </h3>
                                    <div class="mt-2">
                                        <small class="mt-1 text-white fst-italic">
                                            <i class="fas fa-clock"></i>
                                            {{ $post->created_at->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
