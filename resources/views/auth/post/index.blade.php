@extends('auth.layouts.app')
@section('title', 'List Postingan')

@section('content')
    {{-- Notify --}}
    <div id="success" data-flash="{{ session('success') }}"></div>
    <div id="fails" data-flash="{{ session('fails') }}"></div>
    {{-- ====== --}}
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Postingan</h2>
                    <h5 class="text-white op-7 mb-2">List Posts</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('post.create') }}" class="btn btn-secondary btn-round">
                        <i class="fas fa-plus"></i>
                        Posts
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
                            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                                width="100%">
                                <thead>
                                    <th width="18%">Tanggal Publish</th>
                                    <th>Judul</th>
                                    <th width="20%">Thumbnail</th>
                                    <th width="15%">Opsi</th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $post->created_at->format('d M Y') }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <img src="{{ asset('thumbnail/' . $post->thumbnail) }}"
                                                    class="img-thumbnail my-2" width="100px" alt="">
                                            </td>
                                            <td class="form-inline">
                                                <a href="{{ route('post.edit', $post->slug) }}" class="text-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form id="form-delete-{{ $post->id }}"
                                                    action="{{ route('post.delete', $post->slug) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-link text-danger"
                                                    onclick="btnDelete( {{ $post->id }} )">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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
    @push('scripts')
        <script>
            $('#basic-datatables').DataTable();

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
@endsection
