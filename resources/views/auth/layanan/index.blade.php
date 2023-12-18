@extends('auth.layouts.app')
@section('title', 'Layanan')

@section('content')
    {{-- Notify --}}
    <div id="success" data-flash="{{ session('success') }}"></div>
    <div id="fails" data-flash="{{ session('fails') }}"></div>
    {{-- ====== --}}
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Layanan Perusahaan</h2>
                    <h5 class="text-white op-7 mb-2">Services</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('layanan.create') }}" class="btn btn-secondary btn-round">
                        <i class="fas fa-plus"></i>
                        Layanan
                    </a>
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
                            <table id="basic-datatables" class="display table table-striped table-hover" width="100%">
                                <thead class="text-center">
                                    <th width="18%">No</th>
                                    <th>Title</th>
                                    <th>Opsi</th>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($layanans as $layanan)
                                        <tr>
                                            <td class="text-center">{{ $count++ }}</td>
                                            <td>{{ $layanan->title }}</td>
                                            <td>
                                                <a href="{{ route('layanan.edit', $layanan->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                    Edit
                                                </a>
                                                <form id="form-delete-{{ $layanan->id }}"
                                                    action="{{ route('layanan.destroy', $layanan->id) }}" method="post"
                                                    hidden>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="btnDelete( {{ $layanan->id }} )">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
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

        function btnDelete(id) {
            swal({
                title: 'Apa anda yakin?',
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya, hapus sekarang',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $('#form-delete-' + id).submit();
                } else {
                    swal.close();
                }
            });
        }
    </script>
@endpush
