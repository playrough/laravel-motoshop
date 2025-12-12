@extends('layouts.frontend')

@section('title', 'Đơn hàng của bạn')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4 fw-bold text-primary">
            <i class="bi bi-receipt-cutoff me-2"></i> Đơn hàng của bạn
        </h2>

        @if ($donhang->isEmpty())
            <div class="alert alert-info p-4 text-center fs-5">
                <i class="bi bi-emoji-neutral fs-2 d-block mb-2"></i>
                Bạn chưa có đơn hàng nào.
                <br><a href="{{ route('frontend.home') }}" class="btn btn-primary mt-3 px-4">Mua xe ngay</a>
            </div>
        @else
            <div class="row g-4">

                @foreach ($donhang as $dh)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100">

                            {{-- Ảnh xe --}}
                            <img src="{{ asset('storage/' . $dh->XeMay->hinhanh) }}" class="card-img-top"
                                style="height: 180px; object-fit: cover;">

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $dh->XeMay->tenxe }}</h5>

                                <p class="text-muted mb-1">
                                    <i class="bi bi-geo-alt"></i>
                                    Giao đến: <strong>{{ $dh->diachigiaohang }}</strong>
                                </p>

                                <p class="text-muted mb-1">
                                    <i class="bi bi-telephone"></i>
                                    SĐT: <strong>{{ $dh->dienthoaigiaohang }}</strong>
                                </p>

                                <p class="text-muted mb-1">
                                    <i class="bi bi-tags"></i>
                                    Giá: <strong class="text-danger">{{ number_format($dh->dongia, 0, ',', '.') }}
                                        VNĐ</strong>
                                </p>

                                <p class="text-muted">
                                    <i class="bi bi-clock-history"></i>
                                    Ngày đặt: <strong>{{ $dh->created_at->format('d/m/Y H:i') }}</strong>
                                </p>

                                {{-- Tình trạng --}}
                                <span
                                    class="badge
                                @if ($dh->TinhTrang->id == 1) bg-warning
                                @elseif ($dh->TinhTrang->id == 2) bg-info
                                @elseif ($dh->TinhTrang->id == 3) bg-success
                                @else bg-secondary @endif
                                px-3 py-2 fs-6">
                                    {{ $dh->TinhTrang->tinhtrang }}
                                </span>
                            </div>

                            <div class="card-footer bg-white border-0 text-end">
                                <a href="{{ route('user.donhang.chitiet', $dh->id) }}" class="btn btn-outline-primary px-3">
                                    Xem chi tiết
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>
@endsection
