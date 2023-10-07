@extends('layouts.main')
@section('title', 'Data Laporan')
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
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h2 class="mb-1">Laporan Pendapatan {{ tanggal_indonesia($tglAwal) }} -
                                        {{ tanggal_indonesia($tglAkhir) }}</h2>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @include('sweetalert::alert')
                        <div class="card-header">
                            <button class="btn btn-sm btn-primary" onclick="updatePeriode()"><i
                                    class='bx bxs-edit fs-18 align-middle'></i> Ubah
                                Periode</button>
                            <a class="btn btn-sm btn-warning"
                                href="{{ route('laporan.export_pdf', [$tglAwal, $tglAkhir]) }}" target="_blank"><i
                                    class='bx bx-printer fs-18 align-middle'></i> Cetak</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table nowrap table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="true" width="50">No</th>
                                        <th data-ordering="true">Tanggal</th>
                                        <th data-ordering="true">Penjualan</th>
                                        <th data-ordering="true">Pembelian</th>
                                        <th data-ordering="true">Pengeluaran</th>
                                        <th data-ordering="true">Pendapatan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
    @include('laporan.ubah-periode')
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>

    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>

    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('laporan.data', [$tglAwal, $tglAkhir]) }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'penjualan'
                    },
                    {
                        data: 'pembelian'
                    },
                    {
                        data: 'pengeluaran'
                    },
                    {
                        data: 'pendapatan'
                    }
                ],
                dom: 'Brt',
                bSort: false,
                bPaginate: false,
            });

        });

        function updatePeriode() {
            $('#modal-ubah').modal('show');
        }
    </script>
@endpush
