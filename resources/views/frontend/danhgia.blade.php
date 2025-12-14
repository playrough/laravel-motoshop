@extends('layouts.frontend')

@section('title', 'Đánh giá xe')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4">Đánh giá xe</h2>

        @if ($danhgia->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ($danhgia as $dg)
                    <div class="col">
                        <div class="card h-100 shadow-sm">

                            <div class="card-body">
                                {{-- Tên xe --}}
                                <span class="badge bg-primary mb-2">
                                    {{ $dg->xemay->tenxe ?? 'Không rõ xe' }}
                                </span>

                                {{-- Tiêu đề --}}
                                <h5 class="card-title">
                                    {{ $dg->tieude }}
                                </h5>

                                {{-- Nội dung --}}
                                <p class="card-text">
                                    {{ Str::limit($dg->noidung, 120) }}
                                </p>
                            </div>

                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <small>
                                    {{ $dg->user->name ?? 'Khách' }}
                                </small>

                                <span class="badge bg-warning text-dark">
                                    {{ $dg->sosao }} ⭐
                                </span>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Phân trang --}}
            <div class="mt-4">
                {{ $danhgia->links() }}
            </div>
        @else
            <p class="text-muted">Chưa có đánh giá nào.</p>
        @endif

    </div>
@endsection
