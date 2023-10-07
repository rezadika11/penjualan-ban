@extends('frontend.layouts.main')
@section('title', 'Home')
@push('css')
    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
        .carousel-inner img {
            height: 500px;
        }

        .card-img-top {
            height: 300px;
        }

        .swiper {
            height: 220px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>
@endpush
@section('content')
    <div class="page-content">
        <div class="container">
            <!-- Slider main container -->
            <div class="swiper navigation-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sliderban.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/images/sliderban.jpg') }}" alt="">
                    </div>
                </div>
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
                <div class="swiper-pagination"></div>
            </div>

            <!---product-->
            <div class="row mb-4 mt-5">
                <div class="col-12">
                    <div class="d-flex mb-2">
                        <h2 class="">Produk</h2>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($produk as $item)
                            <div class="col">
                                <div class="card ">
                                    <img src="{{ url('/user/storage/' . $item->gambar) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h1 class="card-title fs-22">{{ $item->nama_produk }}</h1>
                                        <h5>Rp . {{ format_uang($item->harga_jual) }}</h5>
                                    </div>
                                    {{-- <div class="card-footer">
                                        <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-primary">Tambah Keranjang</button>
                                            <button class="btn btn-outline-warning">Detail</button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <a href="https://api.whatsapp.com/send?phone=6282138583911&text=Hallo%20saya%20tertarik%20dengan%20produk%20anda"
                class="float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>

        </div>
        <!-- start blog -->
    </div>
@endsection
@push('js')
    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <!-- swiper.init js -->
    <script src="{{ asset('assets/js/pages/swiper.init.js') }}"></script>

    <script>
        var swiper = new Swiper(".navigation-swiper", {
            spaceBetween: 15,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            // },
        });
    </script>
@endpush
