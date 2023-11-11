@extends('auth.layouts.app')
@section('title', 'Update Pengaturan')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="icon-note"></i>
                Pengaturan Website
            </h4>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('pengaturan.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="row" style="padding-top: 2rem;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pengaturan.update', $pengaturan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <br>
                                        @error('title')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            placeholder="Judul.." value="{{ old('title', $pengaturan->title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <br>
                                        @error('content')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <textarea name="content" id="summernote" cols="30" rows="10">{{ $pengaturan->text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <br>
                                        <input type="file" class="form-control" name="img">
                                        <small class="text-muted">*kosongkan jikan tidak ingin mengganti thumbnail</small>
                                        @error('img')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <img src="{{ asset('uploads/img/' . $pengaturan->img) }}" class="img-thumbnail"
                                            alt="">
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-1"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
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
