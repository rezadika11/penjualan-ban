@extends('layouts.main')
@section('title', 'Edit Supplier')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @include('sweetalert::alert')
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">@yield('title')</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
                                <li class="breadcrumb-item active"><a href="#"></a>@yield('title')</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>@yield('title')</h5>
                        </div>
                        <form action="{{ route('supplier.update', $data->id_supplier) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="form-group mb-3">
                                        <label for="produk">Nama</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('nama')
                                            is-invalid
                                        @enderror"
                                                id="nama" name="nama" value="{{ old('nama', $data->nama) }}"
                                                placeholder="Nama">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Telepon</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('telepon')
                                                is-invalid
                                            @enderror"
                                                id="telepon" name="telepon" value="{{ old('telepon', $data->telepon) }}"
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class='bx bx-save fs-16 align-middle'></i>
                                    Simpan</button>
                                <a type="button" class="btn btn-sm btn-light"
                                    href="{{ route('supplier.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
