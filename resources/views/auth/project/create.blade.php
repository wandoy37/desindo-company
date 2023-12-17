@extends('auth.layouts.app')
@section('title', 'Tambah Projects')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="fab fa-palfed"></i>
                Projects
            </h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <span class="text-muted">
                        <i class="fas fa-plus"></i>
                        Project
                    </span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('project.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="row" style="padding-top: 2rem;">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama Proyek</label>
                                <br>
                                @error('title')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Proyek.." value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan Proyek</label>
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Keteranga.." value="{{ old('description') }}">
                                @error('description')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori Proyek</label>
                                <div class="select2-input">
                                    <select id="basic" name="category" class="form-control">
                                        <option value="">--pilih kategori--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto Proyek</label>
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
