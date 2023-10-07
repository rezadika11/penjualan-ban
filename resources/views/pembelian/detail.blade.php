@extends('layouts.main')
@section('title', 'Detail Pembelian')
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
                        {{-- <div class="card-header">

                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalSupplier"><i
                                    class='bx bxs-plus-square fs-18 align-middle'></i> Transaksi Baru</button>
                            @empty(!session('id_pembelian'))
                                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-sm btn-info"><i
                                        class='bx bxs-edit-alt fs-18 align-middle'></i>
                                    Transaksi Aktif</a>
                            @endempty

                        </div> --}}
                        <div class="card-body">
                            <table id="TableDetail" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th data-ordering="true" width="5%">No</th>
                                    <th data-ordering="true">Kode</th>
                                    <th data-ordering="true">Nama</th>
                                    <th data-ordering="true">Harga</th>
                                    <th data-ordering="true">Jumlah</th>
                                    <th data-ordering="true">Subtotal</th>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->produk->kode_produk }}</td>
                                            <td>{{ $item->produk->nama_produk }}</td>
                                            <td>Rp. {{ format_uang($item->harga_beli) }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>Rp. {{ format_uang($item->subtotal) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pembelian.index') }}" class="btn btn-sm btn-primary"> kembali</a>
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
            new DataTable('#TableDetail', {
                processing: true,
                "columnDefs": [{
                        "orderable": false,
                        "targets": 5,
                    },
                    {
                        "searchable": false,
                        "targets": [0, 5]
                    }
                ]
            })

        })
    </script>
@endpush
