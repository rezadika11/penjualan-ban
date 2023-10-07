@extends('layouts.main')
@section('title', 'Tambah Kategori')
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
                                <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
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
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('nama_kategori')
                                            is-invalid
                                        @enderror"
                                                id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                                            @error('nama_kategori')
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
                                    href="{{ route('kategori.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
