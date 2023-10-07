@extends('layouts.main')
@section('title', 'Data Kategori')
@push('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }
    </style>
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">@yield('title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#"></a>@yield('title')</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @include('sweetalert::alert')
                        <div class="card-header">
                            <a class="btn btn-sm btn-primary" href="{{ route('kategori.create') }}"><i
                                    class='bx bxs-plus-square fs-18 align-middle'></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table nowrap table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="true" width="50">No</th>
                                        <th data-ordering="true">Kategori</th>
                                        <th data-ordering="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $kat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kat->nama_kategori }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $kat->id_kategori) }}"
                                                    class="btn btn-sm btn-success"><i
                                                        class='bx bxs-edit fs-16 align-middle'></i>
                                                    Edit</a>
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#modalHapus{{ $kat->id_kategori }}"
                                                    class="btn btn-sm btn-danger"><i
                                                        class='bx bx-trash fs-16 align-middle'></i> Hapus</a>
                                                @include('modal.hapus-kategori')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            new DataTable('#dataTable', {
                scrollX: true,
                processing: true,
                "columnDefs": [{
                        "orderable": false,
                        "targets": 2,
                    },
                    {
                        "searchable": false,
                        "targets": [0, 2]
                    }
                ]
            })

        })
    </script>
@endpush
