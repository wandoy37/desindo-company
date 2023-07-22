@extends('home.layouts.app')
@section('title', 'Tentang Kami')
@section('content')
    <section style="padding-top: 120px;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="font-text-second" style="margin-bottom: 40px;">Tentang Kami</h1>
                </div>
                <div class="col-lg-12">
                    <img src="{{ asset('about') . '/' . $about->image }}" class="img-thumbnail" alt="">
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <div class="col-lg-12">
                    <article>
                        {!! $about->content !!}
                    </article>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <iframe width="1280" height="720" class="shadow" src="{{ $about->youtube }}"
                        style="margin-top: 50px; margin-bottom: 50px;">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
