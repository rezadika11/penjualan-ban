@extends('layouts.main')
@section('title', 'Setting')
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
                        <form action="{{ route('setting.store', $data->id_setting) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="form-group mb-3">
                                        <label for="toko">Nama Toko</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('nama_perusahaan')
                                                is-invalid
                                            @enderror"
                                                name="nama_perusahaan"
                                                value="{{ old('nama_perusahaan', $data->nama_perusahaan) }}"
                                                placeholder="Nama Toko">
                                            @error('nama_perusahaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tlp">Telepon</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('telepon')
                                                is-invalid
                                            @enderror"
                                                name="telepon" value="{{ old('telepon', $data->telepon) }}"
                                                placeholder="telepon">
                                            @error('telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Alamat</label>
                                        <div class="col-md-6">
                                            <textarea
                                                class="form-control @error('alamat')
                                                    is-invalid
                                                @enderror"
                                                name="alamat" cols="30" rows="10">{{ old('alamat', $data->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="diskon">Diskon</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('diskon')
                                            is-invalid
                                        @enderror"
                                                name="diskon" value="{{ old('diskon', $data->diskon) }}"
                                                placeholder="diskon">
                                            @error('diskon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nota">Tipe Nota</label>
                                        <div class="col-md-6">
                                            <select
                                                class="form-control @error('tipe_nota')
                                                        is-invalid
                                                    @enderror"
                                                name="tipe_nota">
                                                <option value="" disabled selected>Pilih Tipe Nota</option>
                                                @foreach ($tipeNota as $key => $val)
                                                    <option value="{{ $key }}"
                                                        {{ old('tipe_nota', $data->tipe_nota) == $key ? 'selected' : '' }}>
                                                        {{ $val }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tipe_nota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class='bx bx-save fs-16 align-middle'></i>
                                    Simpan</button>
                            </div>
                        </form>
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
                        "targets": 9,
                    },
                    {
                        "searchable": false,
                        "targets": [0, 9]
                    }
                ]
            })

        })
    </script>
@endpush
