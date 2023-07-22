@extends('home.layouts.app')
@section('title', 'Project')

@section('content')
    <!-- One Section -->
    <section class="bg-yellow py-4">
        <div class="container pt-4 my-4">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="text-white" style="padding-top: 50px; font-weight:700;">PROJECT</h1>
                    <span class="text-white" style="font-size: 28px;">Beberapa Proyek Yang Berhasil Kami Kerjakan</span>
                    <p class="text-white">
                        Sebagai kontraktor yang profesional dan handal, ada beberapa proyek yang berhasil kami kerjakan dan
                        dapat dijadikan sebagai referensi dalam mengisi website perusahaan.

                        Setiap proyek yang kami kerjakan didasarkan pada standar kualitas tinggi dan kepatuhan terhadap
                        regulasi yang berlaku. Kami dapat menyediakan informasi lebih lanjut dan referensi proyek-proyek
                        tersebut untuk dijadikan sebagai bagian dari konten website perusahaan kami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row g-0 text-center">
                <h1 class="font-text-second" style="margin-bottom: 40px;">Our Projects</h1>
                @foreach ($projects as $project)
                    <div class="col-6 col-md-4">
                        <div class="position-relative"
                            style="height: 320px; background-image: url({{ asset('projects') . '/' . $project->image }}); background-position: center; background-size: cover;">
                            <div class="position-absolute px-3 py-4"
                                style="background: rgba(0, 0, 0, .5); right: 0; bottom: 0; left: 0;">
                                <h3 class="h6 text-white text-start" style="font-weight: 700;">
                                    {{ $project->title }}
                                </h3>
                                <div class="mt-2 text-start">
                                    <small class="mt-1 text-white">
                                        {{ $project->description }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
