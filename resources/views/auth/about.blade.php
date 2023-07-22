@extends('auth.layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="fas fa-info"></i>
                Tentang Kami
            </h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <span class="text-muted">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </span>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <span>Tentang Kami</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="row" style="padding-top: 2rem;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tentang.kami.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Kontent</label>
                                <br>
                                @error('content')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <textarea name="content" id="summernote" cols="30" rows="10">{{ $about->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <br>
                                <small class="text-muted">*kosongkan jikan tidak ingin mengganti foto</small>
                                <input type="file" class="form-control-file" name="image">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Youtube</label>
                                <br>
                                @error('youtube')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input id="youtube" type="text"
                                    class="form-control @error('youtube') is-invalid @enderror" name="youtube"
                                    placeholder="Judul.." value="{{ old('youtube', $about->youtube) }}">
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
@push('scripts')
    <script>
        $('#summernote').summernote({
            placeholder: 'Konten...',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
    </script>
@endpush
