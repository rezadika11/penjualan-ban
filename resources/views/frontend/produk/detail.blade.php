@extends('frontend.layouts.main')
@section('title', 'Detail Produk')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-lg-5">
                                <div class="col-xl-4 col-md-8 mx-auto">
                                    {{-- <div class="product-img-slider sticky-side-div">
                                        <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="assets/images/products/img-8.png" alt=""
                                                        class="img-fluid d-block" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/products/img-6.png" alt=""
                                                        class="img-fluid d-block" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/products/img-1.png" alt=""
                                                        class="img-fluid d-block" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/products/img-8.png" alt=""
                                                        class="img-fluid d-block" />
                                                </div>
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                        <!-- end swiper thumbnail slide -->
                                        <div class="swiper product-nav-slider mt-2">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="nav-slide-item">
                                                        <img src="assets/images/products/img-8.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="nav-slide-item">
                                                        <img src="assets/images/products/img-6.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="nav-slide-item">
                                                        <img src="assets/images/products/img-1.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="nav-slide-item">
                                                        <img src="assets/images/products/img-8.png" alt=""
                                                            class="img-fluid d-block" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end swiper nav slide -->
                                    </div> --}}
                                    <img src="{{ url('/user/storage/' . $produk->gambar) }}" class="card-img-top"
                                        alt="...">

                                </div>
                                <!-- end col -->

                                <div class="col-xl-8">
                                    <div class="mt-xl-0 mt-5">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h4>{{ $produk->nama_produk }}</h4>
                                                {{-- <div class="hstack gap-3 flex-wrap">
                                                    <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a>
                                                    </div>
                                                    <div class="vr"></div>
                                                    <div class="text-muted">Seller : <span
                                                            class="text-body fw-medium">Zoetic
                                                            Fashion</span>
                                                    </div>
                                                    <div class="vr"></div>
                                                    <div class="text-muted">Published : <span class="text-body fw-medium">26
                                                            Mar,
                                                            2021</span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="flex-shrink-0">
                                                <div>
                                                    <a href="apps-ecommerce-add-product.html" class="btn btn-light"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                            class="ri-pencil-fill align-bottom"></i></a>
                                                </div>
                                            </div> --}}
                                        </div>


                                        <!-- end row -->

                                        <div class="product-content mt-5">
                                            <h5 class="fs-14 mb-3">Produk:</h5>
                                            <nav>
                                                <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab"
                                                            href="#nav-speci" role="tab" aria-controls="nav-speci"
                                                            aria-selected="true">Detail</a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab"
                                                            href="#nav-detail" role="tab" aria-controls="nav-detail"
                                                            aria-selected="false">Details</a>
                                                    </li> --}}
                                                </ul>
                                            </nav>
                                            <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-speci" role="tabpanel"
                                                    aria-labelledby="nav-speci-tab">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="width: 200px;">Kategori</th>
                                                                    <td>{{ $produk->nama_kategori }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Merek</th>
                                                                    @if ($produk->merk)
                                                                        <td>{{ $produk->merk }}</td>
                                                                    @else
                                                                        <td>-</td>
                                                                    @endif

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Harga</th>
                                                                    <td>Rp. {{ format_uang($produk->harga_jual) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Stok</th>
                                                                    <td>{{ $produk->stok }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <a href="https://api.whatsapp.com/send?phone=6282138583911&text=Hallo%20saya%20tertarik%20dengan%20produk%20ini%20{{ $produk->nama_produk }}"
                                            class="btn btn-primary mt-3">Beli Sekarang</a>
                                        <!-- product-content -->
                                        <!-- end card body -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
