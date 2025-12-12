@extends('layouts.frontend')

@section('title', 'Đặt hàng')

@section('content')
    <main class="content-wrapper">

        <div class="container pt-3 my-3">
            <h1 class="h4 mb-4 fw-bold">Đặt hàng</h1>

            <div class="row">

                <!-- LEFT: Thông tin giao hàng + thanh toán -->
                <div class="col-lg-8">

                    {{-- SHIPPING INFO --}}
                    <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                        <h5 class="mb-3 fw-semibold">Thông tin giao hàng</h5>

                        <form action="{{ route('user.dathang') }}" method="post" class="needs-validation" novalidate>
                            @csrf

                            <input type="hidden" name="xemay_id" value="{{ $xemay->id }}">
                            <div class="mb-3">
                                <label class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control form-control-lg"
                                    value="{{ Auth::user()->name ?? '' }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Số điện thoại nhận hàng <span class="text-danger">*</span></label>
                                <input type="text" name="dienthoaigiaohang"
                                    class="form-control form-control-lg @error('dienthoaigiaohang') is-invalid @enderror"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Địa chỉ giao hàng <span class="text-danger">*</span></label>
                                <input type="text" name="diachigiaohang"
                                    class="form-control form-control-lg @error('diachigiaohang') is-invalid @enderror"
                                    required>
                            </div>

                            <input type="submit" id="checkout-form-submit" hidden>
                        </form>
                    </div>

                    {{-- PAYMENT METHOD --}}
                    <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                        <h5 class="mb-3 fw-semibold">Phương thức thanh toán</h5>

                        <div class="d-flex flex-column gap-3 fs-base">

                            <label class="d-flex align-items-center gap-2">
                                <input type="radio" name="payment-method" value="cod" class="form-check-input" checked>
                                Thanh toán khi nhận hàng (COD)
                            </label>

                            <label class="d-flex align-items-center gap-2">
                                <input type="radio" name="payment-method" value="creditcard" class="form-check-input">
                                Thẻ tín dụng / ghi nợ
                                <span class="d-flex gap-2 ms-2">
                                    <img src="{{ asset('images/payment-methods/visa-light-mode.svg') }}" width="32">
                                    <img src="{{ asset('images/payment-methods/mastercard.svg') }}" width="32">
                                </span>
                            </label>

                            <label class="d-flex align-items-center gap-2">
                                <input type="radio" name="payment-method" value="paypal" class="form-check-input">
                                PayPal
                                <img src="{{ asset('images/payment-methods/paypal-icon.svg') }}" width="18"
                                    class="ms-2">
                            </label>

                            <label class="d-flex align-items-center gap-2">
                                <input type="radio" name="payment-method" value="googlepay" class="form-check-input">
                                Google Pay
                                <img src="{{ asset('images/payment-methods/google-icon.svg') }}" width="22"
                                    class="ms-2">
                            </label>

                        </div>

                        <div class="form-check mt-3">
                            <input type="checkbox" id="accept-terms" class="form-check-input" checked>
                            <label for="accept-terms" class="form-check-label">
                                Tôi đồng ý với <a href="#" class="text-decoration-underline">Điều khoản & Điều
                                    kiện</a>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: SUMMARY -->
                <aside class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm position-sticky top-0">

                        <h5 class="mb-3 fw-semibold">Tóm tắt đơn hàng</h5>

                        <ul class="list-unstyled fs-sm">
                            <li class="d-flex justify-content-between mb-2">
                                Tổng tiền:
                                <span class="fw-semibold">{{ number_format($xemay->dongia, 0, ',', '.') }}đ</span>
                            </li>
                            <li class="d-flex justify-content-between mb-2">
                                Thuế VAT:
                                <span class="fw-semibold">0đ</span>
                            </li>
                            <li class="d-flex justify-content-between mb-2">
                                Phí vận chuyển:
                                <span class="fw-semibold">0đ</span>
                            </li>
                        </ul>

                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-between">
                                <span class="fw-semibold">Tổng cộng:</span>
                                <span class="fw-semibold">{{ number_format($xemay->dongia, 0, ',', '.') }}đ</span>
                            </div>
                        </div>

                        <label for="checkout-form-submit" class="btn btn-lg btn-primary w-100 mt-4">
                            Đặt hàng
                        </label>

                    </div>
                </aside>

            </div>
        </div>

    </main>
@endsection

@section('floating-button')
    <div class="fixed-bottom d-lg-none bg-white border-top px-3 py-2">
        <label for="checkout-form-submit" class="btn btn-lg btn-primary w-100">Đặt hàng</label>
    </div>
@endsection
