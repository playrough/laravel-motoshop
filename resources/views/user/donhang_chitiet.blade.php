@extends('layouts.frontend')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <main class="content-wrapper">

        <div class="container pt-4 my-4">

            <!-- BACK BUTTON -->
            <a href="{{ route('user.donhang') }}" class="btn btn-outline-secondary mb-3">
                ← Quay lại danh sách đơn hàng
            </a>

            <!-- ORDER HEADER -->
            <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <h3 class="fw-bold mb-1">
                            Đơn hàng #{{ $donhang->id }}
                        </h3>
                        <div class="text-muted small">
                            Đặt ngày: {{ $donhang->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <!-- ORDER STATUS BADGE -->
                    <span
                        class="badge
                    @if ($donhang->tinhtrang_id == 1) bg-warning text-dark
                    @elseif ($donhang->tinhtrang_id == 2) bg-info
                    @elseif ($donhang->tinhtrang_id == 3) bg-success
                    @elseif ($donhang->tinhtrang_id == 4) bg-danger @endif
                    align-self-start px-3 py-2 fs-6">
                        {{ $donhang->TinhTrang->tinhtrang }}
                    </span>
                </div>
            </div>


            <!-- ORDER PRODUCT -->
            <div class="bg-white p-4 rounded-4 shadow-sm mb-4">

                <h5 class="fw-semibold mb-4">Sản phẩm</h5>

                <div class="d-flex gap-3 align-items-start">

                    <img src="{{ asset('storage/' . $donhang->XeMay->hinhanh) }}" alt="Xe máy" class="rounded-3 shadow-sm"
                        width="160">

                    <div>
                        <h5 class="fw-bold">{{ $donhang->XeMay->tenxe }}</h5>

                        <div class="text-muted small mb-2">
                            Hãng: {{ $donhang->XeMay->HangXe->tenhang ?? 'Không rõ' }}
                        </div>

                        <div class="h4 fw-bold text-danger">
                            {{ number_format($donhang->dongia, 0, ',', '.') }} đ
                        </div>
                    </div>

                </div>
            </div>


            <!-- CUSTOMER INFO -->
            <div class="bg-white p-4 rounded-4 shadow-sm mb-4">

                <h5 class="fw-semibold mb-3">Thông tin giao hàng</h5>

                <ul class="list-unstyled fs-base mb-0">
                    <li class="mb-2">
                        <strong>Người nhận:</strong>
                        {{ $donhang->User->name }}
                    </li>

                    <li class="mb-2">
                        <strong>Số điện thoại:</strong>
                        {{ $donhang->dienthoaigiaohang }}
                    </li>

                    <li class="mb-2">
                        <strong>Địa chỉ giao hàng:</strong>
                        {{ $donhang->diachigiaohang }}
                    </li>
                </ul>
            </div>


            <!-- PAYMENT SUMMARY -->
            <div class="bg-white p-4 rounded-4 shadow-sm">

                <h5 class="fw-semibold mb-3">Tóm tắt thanh toán</h5>

                <ul class="list-unstyled fs-base">
                    <li class="d-flex justify-content-between mb-2">
                        <span>Giá sản phẩm</span>
                        <span class="fw-semibold">
                            {{ number_format($donhang->dongia, 0, ',', '.') }} đ
                        </span>
                    </li>

                    <li class="d-flex justify-content-between mb-2">
                        <span>Phí vận chuyển</span>
                        <span class="fw-semibold">0 đ</span>
                    </li>

                    <li class="d-flex justify-content-between mb-2">
                        <span>Thuế VAT</span>
                        <span class="fw-semibold">0 đ</span>
                    </li>
                </ul>

                <div class="border-top mt-3 pt-3 d-flex justify-content-between">
                    <span class="fw-bold fs-5">Tổng cộng</span>
                    <span class="fw-bold fs-4 text-danger">
                        {{ number_format($donhang->dongia, 0, ',', '.') }} đ
                    </span>
                </div>

            </div>

        </div>

    </main>
@endsection
