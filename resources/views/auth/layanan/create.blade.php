@extends('auth.layouts.app')
@section('title', 'Tambah Layanan')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="fas fa-seedling"></i>
                Layanan
            </h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <span class="text-muted">
                        <i class="fas fa-plus"></i>
                        Layanan
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama Layanan</label>
                                <br>
                                @error('title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Proyek.." value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>Foto Layanan</label>
                                <input type="file" class="form-control-file" name="image">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
