@extends('auth.layouts.app')
@section('title', 'Edit Profile')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">
                <i class="fas fa-user"></i>
                Profile Setting
            </h4>
            {{-- <ul class="breadcrumbs">
                <li class="nav-home">
                    <span class="text-muted">
                        <i class="fas fa-sync"></i>
                        Edit Project
                    </span>
                </li>
            </ul> --}}
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="username">Username</label>
                                <br>
                                @error('username')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    placeholder="Username" value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <br>
                                @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email" value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    placeholder="password">
                                @error('password')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>password Confirmation</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control" placeholder="Password Confirmation">
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
        </div>

    </div>
@endsection
