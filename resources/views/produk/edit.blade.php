@extends('layouts.main')
@section('title', 'Edit Produk')
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
                                <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
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
                        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="form-group mb-3">
                                        <label for="produk">Nama Produk</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('nama_produk')
                                            is-invalid
                                        @enderror"
                                                id="nama_produk" name="nama_produk"
                                                value="{{ old('nama_produk', $produk->nama_produk) }}"
                                                placeholder="Nama Produk">
                                            @error('nama_produk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        {{-- <label for="image" class="col-sm-2 col-form-label">G</label> --}}
                                        <div class="col-sm-10">
                                            <img src="{{ route('produk.getImage', $produk->gambar) }}" width="400"
                                                class="img-fluid" height="200" alt="" id="imgPreview">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="gambar">Gambar</label>
                                        <div class="col-md-6">
                                            <input type="file"
                                                class="form-control @error('gambar')
                                            is-invalid
                                        @enderror"
                                                id="gambar" name="gambar" value="{{ old('gambar') }}"
                                                placeholder="Gambar" onchange="preview()">
                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Kategori</label>
                                        <div class="col-md-6">
                                            <select
                                                class="form-control @error('id_kategori')
                                                    is-invalid
                                                @enderror"
                                                name="id_kategori">
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id_kategori }}"
                                                        {{ old('id_kategori', $produk->id_kategori) == $kat->id_kategori ? 'selected' : '' }}>
                                                        {{ $kat->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Merk</label>
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('merk')
                                                is-invalid
                                            @enderror"
                                                id="merk" name="merk" value="{{ old('merk', $produk->merk) }}"
                                                placeholder="Merk">
                                            @error('merk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Harga Beli</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('harga_beli')
                                                is-invalid
                                            @enderror"
                                                id="harga_beli" name="harga_beli"
                                                value="{{ old('harga_beli', $produk->harga_beli) }}"
                                                placeholder="Harga Beli">
                                            @error('harga_beli')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Harga Jual</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('harga_jual')
                                                is-invalid
                                            @enderror"
                                                id="harga_jual" name="harga_jual"
                                                value="{{ old('harga_jual', $produk->harga_jual) }}"
                                                placeholder="Harga Jual">
                                            @error('harga_jual')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Diskon</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('diskon')
                                                is-invalid
                                            @enderror"
                                                id="diskon" name="diskon" value="{{ old('diskon', $produk->diskon) }}"
                                                placeholder="Diskon">
                                            @error('diskon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="produk">Stok</label>
                                        <div class="col-md-6">
                                            <input type="number"
                                                class="form-control @error('stok')
                                                is-invalid
                                            @enderror"
                                                id="stok" name="stok" value="{{ old('stok', $produk->stok) }}"
                                                placeholder="Stok">
                                            @error('stok')
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
                                    href="{{ route('produk.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
