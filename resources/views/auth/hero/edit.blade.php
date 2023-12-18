@extends('auth.layouts.app')
@section('title', 'Pengaturan Website')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="fas fa-seedling"></i>
                Pengaturan Website
            </h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <span class="text-muted">
                        <i class="fas fa-pen mr-1"></i>
                        {{ $hero->image }}
                    </span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('layanan.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="row" style="padding-top: 2rem;">
            <div class="col-lg-8">
                <div class="card py-4">
                    <div class="card-body">
                        <form action="{{ route('pengaturan.hero.update', $hero->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Image</label>
                                <br>
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sync mr-1"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <label class="mb-2">Preview Image - {{ $hero->image }}</label>
                <img class="img-fluid" src="{{ asset('hero/' . $hero->image) }}" alt="Card image">
            </div>
        </div>

    </div>
@endsection
