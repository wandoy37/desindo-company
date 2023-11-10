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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                                width="100%">
                                <thead class="text-center">
                                    <th width="18%">No</th>
                                    <th>Title</th>
                                    <th>Img</th>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($pengaturans as $pengaturan)
                                        <tr>
                                            <td class="text-center">{{ $count++ }}</td>
                                            <td>{{ $pengaturan->title }}</td>
                                            <td>
                                                <img class="img-thumbnail my-2"
                                                    src="{{ asset('uploads/img/' . $pengaturan->img) }}" width="150rem"
                                                    alt="thumbnail">
                                            </td>
                                            <td class="form-inline">
                                                <a href="{{ route('pengaturan.edit', $pengaturan->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
