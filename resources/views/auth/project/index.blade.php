@extends('auth.layouts.app')
@section('title', 'List Project')

@section('content')
    {{-- Notify --}}
    <div id="success" data-flash="{{ session('success') }}"></div>
    <div id="fails" data-flash="{{ session('fails') }}"></div>
    {{-- ====== --}}
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Project</h2>
                    <h5 class="text-white op-7 mb-2">List Projects</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="{{ route('project.create') }}" class="btn btn-secondary btn-round">
                        <i class="fas fa-plus"></i>
                        Project
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row g-0">
            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="grad1">
                        <img class="img-fluid" src="{{ asset('projects/' . $project->image) }}" alt="Card image">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="mt-auto">
                                <h5 class="card-title font-weight-bold">{{ $project->title }}</h5>
                                <span>{{ $project->description }}</span>
                                <div class="float-right form-inline">
                                    <a href="{{ route('project.edit', $project->id) }}" class="text-primary">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form id="form-delete-{{ $project->id }}"
                                        action="{{ route('project.delete', $project->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="btn btn-link text-danger"
                                        onclick="btnDelete( {{ $project->id }} )">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
