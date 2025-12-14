@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý đánh giá</h2>
            <a href="{{ route('admin.danhgia.them') }}" class="btn btn-primary shadow-sm">
                <i class="fa-light fa-plus"></i> Thêm mới
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Người đánh giá</th>
                            <th width="15%">Xe máy</th>
                            <th width="15%">Tiêu đề</th>
                            <th width="5%">Sao</th>
                            <th width="25%">Nội dung</th>
                            <th width="5%" class="text-center">Duyệt</th>
                            <th width="10%" class="text-center">Kích hoạt</th>
                            <th width="5%" class="text-center">Sửa</th>
                            <th width="5%" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhgia as $item)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $item->user->name ?? 'Khách' }}</td>
                                <td class="text-muted">{{ $item->xemay->tenxe ?? 'Không xác định' }}</td>
                                <td>{{ $item->tieude ?? '-' }}</td> {{-- Hiển thị tiêu đề --}}
                                <td class="text-center">{{ $item->sosao }}</td>
                                <td>{{ Str::limit($item->noidung, 100) }}</td>
                                <td class="text-center">
                                    @if ((int) $item->kiemduyet === 1)
                                        <span class="badge bg-success">Đã duyệt</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Chờ duyệt</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ((int) $item->kichhoat === 1)
                                        <span class="badge bg-success">Kích hoạt</span>
                                    @else
                                        <span class="badge bg-secondary text-dark">Chưa kích hoạt</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.danhgia.sua', ['id' => $item->id]) }}" class="text-warning">
                                        <i class="fa-light fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.danhgia.xoa', ['id' => $item->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa đánh giá này không?')" class="text-danger">
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
