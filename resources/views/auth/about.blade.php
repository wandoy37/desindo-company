@extends('auth.layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    <div id="fails" data-flash="{{ session('errors') }}"></div>

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
            <form action="{{ route('tentang.kami.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
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
                                <input type="file" class="form-control-file" name="image" value="halo">
                                @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small>Preview Foto</small>
                                <br>
                                <img src="{{ asset('about/' . $about->image) }}" class="img-thumbnail" width="250px"
                                    alt="">
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Details Informations</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">address</label>
                                        <br>
                                        @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            placeholder="Address.." value="{{ old('address', $about->address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">email</label>
                                        <br>
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Email.." value="{{ old('email', $about->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Number Phone</label>
                                        <br>
                                        @error('number_phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <input id="number_phone" type="text"
                                            class="form-control @error('number_phone') is-invalid @enderror"
                                            name="number_phone" placeholder="Number Phone.."
                                            value="{{ old('number_phone', $about->number_phone) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Maps</label>
                                        <br>
                                        @error('maps')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <input id="maps" type="text"
                                            class="form-control @error('maps') is-invalid @enderror" name="maps"
                                            placeholder="Maps.." value="{{ old('maps', $about->maps) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <br>
                                <small class="text-muted">*kosongkan jikan tidak ingin mengganti logo</small>
                                <input type="file" class="form-control-file" name="logo">
                                @error('logo')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small>Preview Logo</small>
                                <br>
                                <img src="{{ asset('about/' . $about->logo) }}" class="img-thumbnail" alt="">
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        var flash = $('#fails').data('flash');
        if (flash) {
            $.notify({
                // options
                icon: 'fas fa-info',
                title: 'Update informasi profile anda gagal, silahkan cek kembali',
                message: '{{ session('fails') }}',
            }, {
                // settings
                type: 'warning',
            });
        }
    </script>
@endpush
