@extends('layouts.frontend')

@section('title', 'Đặt hàng thành công')

@section('content')
    <div class="container py-5">

        <div class="bg-white p-4 rounded-4 shadow-sm">

            <h2 class="fw-bold text-success mb-3">Đặt hàng thành công!</h2>
            <p class="mb-4">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ sớm nhất.</p>

            <h5 class="fw-semibold">Thông tin đơn hàng</h5>

            <ul class="list-unstyled mt-3 fs-base">
                <li><b>Mã đơn hàng:</b> DH{{ $donhang->id }}</li>
                <li><b>Sản phẩm:</b> {{ $donhang->xeMay->tenxe }}</li>
                <li><b>Giá:</b> {{ number_format($donhang->dongia) }}đ</li>
                <li><b>Địa chỉ giao hàng:</b> {{ $donhang->diachigiaohang }}</li>
                <li><b>Số điện thoại:</b> {{ $donhang->dienthoaigiaohang }}</li>
            </ul>

            <a href="{{ route('user.donhang') }}" class="btn btn-primary mt-3">
                Xem danh sách đơn hàng
            </a>

        </div>

    </div>
@endsection
