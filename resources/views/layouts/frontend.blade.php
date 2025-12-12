<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" data-pwa="true">

<head>
    <meta charset="utf-8" />

    <!-- Viewport -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Title -->
    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" />
    @yield('css')

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @yield('javascript')

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('frontend.home') }}">{{ config('app.name', 'Laravel') }}</a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainNav">

                <!-- NAV GIỮA -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-1"><a class="nav-link active" href="{{ route('frontend.home') }}">Trang
                            chủ</a></li>
                    <li class="nav-item mx-1"><a class="nav-link" href="{{ route('frontend.xemay') }}">Xe máy</a></li>
                    <li class="nav-item mx-1"><a class="nav-link" href="#">Tin tức</a></li>
                    <li class="nav-item mx-1"><a class="nav-link" href="{{ route('frontend.lienhe') }}">Liên hệ</a></li>
                    <li class="nav-item mx-1"><a class="nav-link" href="{{ route('user.hoso') }}">Tài khoản</a></li>
                </ul>

                <!-- ACCOUNT Ở CUỐI -->
                <ul class="navbar-nav">

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dangnhap') }}">
                                    <i class="fa-light fa-fw fa-sign-in-alt"></i> Đăng nhập
                                </a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dangky') }}">
                                    <i class="fa-light fa-user-plus"></i> Đăng ký
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#nguoidung" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                <i class="fa-light fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa-light fa-fw fa-sign-out-alt"></i> Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-light border-top mt-5">
        <div class="container py-5">
            <div class="row g-4">

                <!-- Cột 1: Thông tin liên hệ -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Liên hệ</h5>
                    <p class="mb-1"><i class="fa-light fa-location-dot"></i> 123 Nguyễn Trãi, Hà Nội</p>
                    <p class="mb-1"><i class="fa-light fa-phone"></i> <a href="tel:0123456789">0123 456 789</a></p>
                    <p class="mb-1"><i class="fa-light fa-envelope"></i> <a
                            href="mailto:support@motoshop.com">support@motoshop.com</a></p>
                    <p class="mb-1"><i class="fa-light fa-clock"></i> Thứ 2 - Thứ 7: 08:00 - 18:00</p>
                </div>

                <!-- Cột 2: Liên kết nhanh -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('frontend.home') }}" class="text-decoration-none text-dark">Trang chủ</a>
                        </li>
                        <li><a href="#" class="text-decoration-none text-dark">Xe máy</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Tin tức</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Liên hệ</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Chính sách bảo hành</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Điều khoản & bảo mật</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Mạng xã hội & thanh toán -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Kết nối & Thanh toán</h5>

                    <!-- Social Media -->
                    <div class="mb-3">
                        <a href="#" class="text-dark me-2 fs-5"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-dark me-2 fs-5"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-dark me-2 fs-5"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-dark me-2 fs-5"><i class="fab fa-zalo"></i></a>
                    </div>

                    <!-- Payment Methods -->
                    <div class="d-flex gap-2 flex-wrap">
                        <img src="{{ asset('images/payment-methods/visa-light-mode.svg') }}" alt="Visa"
                            height="30">
                        <img src="{{ asset('images/payment-methods/mastercard.svg') }}" alt="Mastercard"
                            height="30">
                        <img src="{{ asset('images/payment-methods/paypal-light-mode.svg') }}" alt="PayPal"
                            height="30">
                        <img src="{{ asset('images/payment-methods/google-pay-light-mode.svg') }}" alt="Google Pay"
                            height="30">
                        <img src="{{ asset('images/payment-methods/apple-pay-light-mode.svg') }}" alt="Apple Pay"
                            height="30">
                    </div>
                </div>

                <!-- Cột 4: Newsletter -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Đăng ký nhận tin</h5>
                    <form action="#" method="post">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email của bạn" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
                    <small class="text-muted">Chúng tôi sẽ gửi thông tin khuyến mãi & tin tức mới nhất.</small>
                </div>

            </div>

            <hr class="my-4">

            <div class="text-center text-muted small">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>
