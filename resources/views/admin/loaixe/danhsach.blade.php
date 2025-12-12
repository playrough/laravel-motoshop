@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý loại xe</h2>
            <a href="{{ route('admin.loaixe.them') }}" class="btn btn-primary shadow-sm">
                <i class="fa-light fa-plus"></i> Thêm mới
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="45%">Tên loại</th>
                            <th width="40%">Tên loại không dấu</th>
                            <th width="5%" class="text-center">Sửa</th>
                            <th width="5%" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loaixe as $value)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $value->tenloai }}</td>
                                <td class="text-muted">{{ $value->tenloai_slug }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.loaixe.sua', ['id' => $value->id]) }}" class="text-warning">
                                        <i class="fa-light fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.loaixe.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa loại xe {{ $value->tenloai }} không?')"
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
