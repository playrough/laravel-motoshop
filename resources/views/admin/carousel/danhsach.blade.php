@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý Carousel</h2>
            <a href="{{ route('admin.carousel.them') }}" class="btn btn-primary shadow-sm">
                <i class="fa-light fa-plus"></i> Thêm mới
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Banner</th>
                            <th width="20%">Tiêu đề</th>
                            <th width="20%">Mô tả</th>
                            <th width="5%" class="text-center">Thứ tự</th>
                            <th width="10%" class="text-center">Kích hoạt</th>
                            <th width="5%" class="text-center">Sửa</th>
                            <th width="5%" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carousels as $value)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($value->banner)
                                        <img src="{{ asset('uploads/carousel/' . $value->banner) }}"
                                            alt="{{ $value->tieude }}" class="img-thumbnail" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $value->tieude }}</td>
                                <td class="text-muted">{{ $value->mota }}</td>
                                <td class="text-center">{{ $value->thutu }}</td>
                                <td class="text-center">
                                    @if ($value->kichhoat)
                                        <span class="badge bg-success">Bật</span>
                                    @else
                                        <span class="badge bg-secondary">Tắt</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.carousel.sua', ['id' => $value->id]) }}" class="text-warning">
                                        <i class="fa-light fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.carousel.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa carousel {{ $value->tieude }} không?')"
                                        class="text-danger">
                                        <i class="fa-light fa-trash-alt fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
