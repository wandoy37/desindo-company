@extends('auth.layouts.app')
@section('title', 'Pengaturan')

@section('content')
    {{-- Notify --}}
    <div id="success" data-flash="{{ session('success') }}"></div>
    <div id="fails" data-flash="{{ session('fails') }}"></div>
    {{-- ====== --}}
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Pengaturan Website</h2>
                    <h5 class="text-white op-7 mb-2">Web Settings</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Hero Section</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-0 justify-content-center">
                            @foreach ($heros as $hero)
                                <div class="col-md-4">
                                    <div class="grad1">
                                        <img class="img-fluid" src="{{ asset('hero/' . $hero->image) }}" alt="Card image">
                                        <div class="card-img-overlay d-flex flex-column">
                                            <div class="mt-auto">
                                                <span class="badge badge-count">{{ $hero->image }}</span>
                                                <div class="float-right">
                                                    <a href="{{ route('pengaturan.hero.edit', $hero->id) }}"
                                                        class="text-primary">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Notify
        var flash = $('#success').data('flash');
        if (flash) {
            $.notify({
                // options
                icon: 'fas fa-check',
                title: 'Berhasil',
                message: '{{ session('success') }}',
            }, {
                // settings
                type: 'success',
            });
        }
        var flash = $('#fails').data('flash');
        if (flash) {
            $.notify({
                // options
                icon: 'fas fa-ban',
                title: 'Gagal',
                message: '{{ session('fails') }}',
            }, {
                // settings
                type: 'danger',
            });
        }
    </script>
@endpush
