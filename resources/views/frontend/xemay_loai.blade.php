@extends('layouts.frontend')

@section('title', $loaixe->tenloai ?? 'Xe máy')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4">{{ $loaixe->tenloai }}</h2>

        @if ($xemay->count())
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($xemay as $xm)
                    <div class="col">
                        <div class="card h-100">
                            <a
                                href="{{ route('frontend.xemay.chitiet', ['tenloai_slug' => $loaixe->tenloai_slug, 'tenxe_slug' => $xm->tenxe_slug]) }}">
                                <img src="{{ $xm->hinhanh ? asset('storage/' . $xm->hinhanh) : 'https://via.placeholder.com/300x200' }}"
                                    class="card-img-top" alt="{{ $xm->tenxe }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('frontend.xemay.chitiet', ['tenloai_slug' => $loaixe->tenloai_slug, 'tenxe_slug' => $xm->tenxe_slug]) }}"
                                        class="text-decoration-none">
                                        {{ $xm->tenxe }}
                                    </a>
                                </h5>
                                <p class="card-text">{{ $xm->HangXe->tenhang ?? 'Đang cập nhật' }}</p>
                            </div>
                            <div class="card-footer text-end">
                                <strong>{{ number_format($xm->dongia, 0, ',', '.') }} đ</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $xemay->links() }}
            </div>
        @else
            <p>Hiện chưa có sản phẩm nào trong loại xe này.</p>
        @endif

    </div>
@endsection
