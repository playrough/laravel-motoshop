@extends('layouts.frontend')

@section('title', $xemay->tenxe)

@section('content')
    <div class="container py-5">

        <div class="row g-5">

            <!-- LEFT: Product Images -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $xemay->hinhanh) }}" class="card-img-top rounded"
                        alt="{{ $xemay->tenxe }}">
                </div>

                {{-- Gallery (nếu có thêm ảnh) --}}
                {{--
            <div class="d-flex gap-3 mt-3">
                <img src="" class="rounded shadow-sm" width="100">
                <img src="" class="rounded shadow-sm" width="100">
                <img src="" class="rounded shadow-sm" width="100">
            </div>
            --}}
            </div>

            <!-- RIGHT: Product Info -->
            <div class="col-lg-6">

                <h2 class="fw-bold">{{ $xemay->tenxe }}</h2>

                <div class="mb-2">
                    <span class="badge bg-light text-dark me-2">Loại xe: {{ $xemay->LoaiXe->tenloai }}</span>
                    <span class="badge bg-light text-dark">Hãng: {{ $xemay->HangXe->tenhang }}</span>
                </div>

                <h3 class="text-danger fw-bold mt-3">
                    {{ number_format($xemay->dongia, 0, ',', '.') }} đ
                </h3>

                <p class="mt-4">{{ $xemay->mota }}</p>

                <!-- ACTION BUTTONS -->
                <div class="d-flex gap-3 mt-4">

                    <a href="{{ route('user.dathang', ['xemay' => $xemay->id]) }}" class="btn btn-primary px-4 py-2">
                        <i class="fa-regular fa-truck-fast"></i> Đặt hàng
                    </a>

                    <a href="tel:0123456789" class="btn btn-outline-danger px-4 py-2">
                        <i class="fa-light fa-phone"></i> Gọi ngay
                    </a>

                    <a href="https://zalo.me/0123456789" target="_blank" class="btn btn-outline-info px-4 py-2">
                        <i class="fa-light fa-message"></i> Chat Zalo
                    </a>

                </div>

                <!-- SPECIFICATIONS -->
                <div class="mt-5">
                    <h4 class="fw-semibold">Thông số kỹ thuật</h4>

                    <ul class="list-group mt-2 shadow-sm">
                        <li class="list-group-item">Động cơ: {{ $xemay->dongco ?? 'Đang cập nhật' }}</li>
                        <li class="list-group-item">Dung tích: {{ $xemay->dungtich ?? 'Đang cập nhật' }}</li>
                        <li class="list-group-item">Năm sản xuất: {{ $xemay->namsanxuat ?? '---' }}</li>
                        <li class="list-group-item">Màu sắc: {{ $xemay->mausac ?? '---' }}</li>
                    </ul>
                </div>
            </div>
        </div>



        {{-- ĐÁNH GIÁ --}}
        <div class="mt-5">

            <h4 class="fw-bold mb-3">Đánh giá từ khách hàng</h4>

            {{-- Tổng sao --}}
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="fs-3 text-warning">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= round($xemay->DanhGia->avg('sao')))
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>
                <span class="text-muted">
                    {{ number_format($xemay->DanhGia->avg('sao'), 1) }}/5
                    ({{ $xemay->DanhGia->count() }} đánh giá)
                </span>
            </div>

            <!-- RELATED PRODUCTS -->
            <div class="mt-5">
                <h3 class="fw-bold mb-4">Xe cùng loại</h3>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">

                    @foreach ($goiy as $sp)
                        <div class="col">
                            <div class="card h-100 shadow-sm">

                                <a
                                    href="{{ route('frontend.xemay.chitiet', [
                                        'tenloai_slug' => $sp->LoaiXe->tenloai_slug,
                                        'tenxe_slug' => $sp->tenxe_slug,
                                    ]) }}">
                                    <img src="{{ asset('storage/' . $sp->hinhanh) }}" class="card-img-top"
                                        style="height: 180px; object-fit: cover;">
                                </a>

                                <div class="card-body">
                                    <h6 class="fw-semibold">{{ $sp->tenxe }}</h6>
                                    <span class="text-danger fw-bold">
                                        {{ number_format($sp->dongia, 0, ',', '.') }} đ
                                    </span>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    @endsection
