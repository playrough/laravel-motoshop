@extends('layouts.frontend')

@section('title', 'Trang chủ')

@section('content')
    <div class="content-wrapper">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner-2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 20%;">
                        <h5 class="fs-1">“Tốc Độ Mang Dấu Ấn Riêng”</h5>
                        <p class="fs-4">Chạy theo cách của bạn.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner-3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 20%;">
                        <h5 class="fs-1">“Làm Chủ Mọi Cung Đường”</h5>
                        <p class="fs-4">Tự do luôn thuộc về người dám chạy.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner-4.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 20%;">
                        <h5 class="fs-1">“Khởi Động Hành Trình”</h5>
                        <p class="fs-4">Mỗi con đường là một câu chuyện mới.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <!-- Brand Logos Row -->
        <section class="container my-5">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">

                @foreach ($hangxe as $hx)
                    <a href="{{ route('frontend.xemay.phanhang', ['tenhang_slug' => $hx->tenhang_slug]) }}"
                        class="d-block p-2"
                        style="width: 100px; height: 80px; display: flex; align-items: center; justify-content: center; transition: transform .25s;">

                        <img src="{{ asset('storage/' . $hx->hinhanh) }}" alt="{{ $hx->tenhang }}" class="img-fluid"
                            style="max-height: 60px; object-fit: contain;">
                    </a>
                @endforeach

            </div>
        </section>

        <style>
            a:hover img {
                transform: scale(1.1);
                transition: transform 0.25s;
            }
        </style>



        <!-- Products (Grid) -->
        @foreach ($loaixe as $lx)
            <section class="container pt-4 mt-2 mb-3">
                <!-- Heading -->
                <div class="d-flex align-items-center justify-content-between pb-1 pb-md-4">
                    <h2 class="h3 mb-0">{{ $lx->tenloai }}</h2>
                    <div class="nav ms-3">
                        <a class="nav-link animate-underline px-0 py-2"
                            href="{{ route('frontend.xemay.phanloai', ['tenloai_slug' => $lx->tenloai_slug]) }}">
                            <span class="animate-target">Xem tất cả</span> <i class="ci-chevron-right fs-base ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Product grid -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <!-- Item -->
                    @foreach ($lx->XeMay as $xm)
                        <!-- Item 1 -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100">

                                <a class="d-block rounded-top overflow-hidden w-100 h-50"
                                    href="{{ route('frontend.xemay.chitiet', ['tenloai_slug' => $lx->tenloai_slug, 'tenxe_slug' => $xm->tenxe_slug]) }}">
                                    <div style="--cz-aspect-ratio:calc(240 / 258 * 100%)">
                                        <img src="{{ asset('storage/' . $xm->hinhanh) }}" class="card-img-top h-50"
                                            alt="Moto 1">
                                    </div>
                                    <span
                                        class="badge bg-info position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">Mới</span>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a class="d-block fs-sm fw-medium text-truncate"
                                            href="{{ route('frontend.xemay.chitiet', ['tenloai_slug' => $lx->tenloai_slug, 'tenxe_slug' => $xm->tenxe_slug]) }}">
                                            <span class="animate-target">{{ $xm->tenxe }}</span>
                                        </a>
                                    </h5>
                                    <p class="card-text">{{ $xm->mota }}</p>
                                </div>
                                <div class="card-footer">
                                    {{ number_format($xm->dongia, 0, ',', '.') }}
                                    <small class="text-muted">đ</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach

    </div>
@endsection
