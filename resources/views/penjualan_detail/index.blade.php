@extends('layouts.main')
@section('title', 'Transaksi penjualan')
@push('css')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <style>
        .tampil-bayar {
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 15px;
            background: #f0f0f0;
            font-size: 15px;
        }

        .table-penjualan tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }

            .tampil-terbilang {
                padding: 10px;
                background: #f0f0f0;
            }
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
                        </div> --}}
                        <div class="card-body">
                            <form class="form-produk mb-5">
                                @csrf
                                <div class="form-group row">
                                    <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                            <input type="hidden" name="id_penjualan" id="id_penjualan"
                                                value="{{ $id_penjualan }}">
                                            <input type="hidden" name="id_produk" id="id_produk">
                                            <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                            {{-- <span class="input-group-btn"> --}}
                                            <button onclick="tampilProduk()" class="btn btn-info btn-flat" type="button"><i
                                                    class='bx bx-right-arrow-alt fs-18 align-middle'></i></button>
                                            {{-- </span> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table nowrap table-striped table-bordered table-penjualan mb-5"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="true" width="50">No</th>
                                        <th data-ordering="true">Kode</th>
                                        <th data-ordering="true">Nama Produk</th>
                                        <th data-ordering="true">Harga</th>
                                        <th data-ordering="true" width="14%">Jumlah</th>
                                        <th data-ordering="true">Diskon</th>
                                        <th data-ordering="true">Subtotal</th>
                                        <th data-ordering="false">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="tampil-bayar bg-primary text-white"></div>
                                    <div class="tampil-terbilang"></div>
                                </div>
                                <div class="col-lg-4">
                                    <form action="{{ route('transaksi.simpan') }}" class="form-penjualan" method="post">
                                        @csrf
                                        <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                                        <input type="hidden" name="total" id="total">
                                        <input type="hidden" name="total_item" id="total_item">
                                        <input type="hidden" name="bayar" id="bayar">

                                        <div class="form-group row mb-3">
                                            <label for="totalrp" class="col-lg-2 control-label">Total</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="totalrp" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="diskon" class="col-lg-2 control-label">Diskon</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="diskon" id="diskon" class="form-control"
                                                    value="{{ $diskon }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="bayar" class="col-lg-2 control-label">Bayar</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="bayarrp" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="diterima" class="col-lg-2 control-label">Diterima</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="diterima" name="diterima"
                                                    class="form-control" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kembali" class="col-lg-2 control-label">Kembali</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="kembali" name="kembali" class="form-control"
                                                    readonly value="0">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary btn-sm btn-simpan"><i
                                        class='bx bxs-save fs-14 align-middle'></i>
                                    Simpan Transaksi</button>
                            </div>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
    @include('penjualan_detail.produk')
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
        let table;
        $(function() {
            table = $('.table-penjualan').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('transaksi.data', $id_penjualan) }}',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'kode_produk'
                        },
                        {
                            data: 'nama_produk'
                        },
                        {
                            data: 'harga_jual'
                        },
                        {
                            data: 'jumlah'
                        },
                        {
                            data: 'diskon'
                        },
                        {
                            data: 'subtotal'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ],
                    bInfo: false,
                    dom: 'lrtip',
                    bSort: false,
                    paginate: false
                })
                .on('draw.dt', function() {
                    loadForm($('#diskon').val());
                    // setTimeout(() => {
                    //     $('#diterima').trigger('input');
                    // }, 300);
                });
            new DataTable('#modalDataTable', {
                processing: true,
                "columnDefs": [{
                        "orderable": false,
                        "targets": 4,
                    },
                    {
                        "searchable": false,
                        "targets": [0, 4]
                    }
                ]
            });

            $(document).on('input', '.quantity', function() {
                let id = $(this).data('id');
                let jumlah = parseInt($(this).val());

                if (jumlah < 1) {
                    $(this).val(1);
                    alert('Jumlah tidak boleh kurang dari 1');
                    return;
                }
                if (jumlah > 10000) {
                    $(this).val(10000);
                    alert('Jumlah tidak boleh lebih dari 10000');
                    return;
                }

                $.post(`{{ url('/transaksi') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'jumlah': jumlah
                    })
                    .done(response => {
                        $(this).on('mouseout', function() {
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        });
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            });

            $(document).on('input', '#diskon', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            });

            $('#diterima').on('input', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($('#diskon').val(), $(this).val());
            })

            $('.btn-simpan').on('click', function() {
                $('.form-penjualan').submit();
            });
        });

        function tampilProduk() {
            $('#modal-produk').modal('show');
        }

        function hideProduk() {
            $('#modal-produk').modal('hide');
        }

        function pilihProduk(id, kode) {
            $('#id_produk').val(id);
            $('#kode_produk').val(kode);
            hideProduk();
            tambahProduk();
        }

        function tambahProduk() {
            $.post('{{ route('transaksi.store') }}', $('.form-produk').serialize())
                .done(response => {
                    $('#kode_produk').focus();
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function loadForm(diskon = 0, diterima = 0) {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());

            $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
                .done(response => {
                    $('#totalrp').val('Rp. ' + response.totalrp);
                    $('#bayarrp').val('Rp. ' + response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text('Bayar: Rp. ' + response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);

                    $('#kembali').val('Rp.' + response.kembalirp);
                    if ($('#diterima').val() != 0) {
                        $('.tampil-bayar').text('Kembali: Rp. ' + response.kembalirp);
                        $('.tampil-terbilang').text(response.kembali_terbilang);
                    }
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>
@endpush
