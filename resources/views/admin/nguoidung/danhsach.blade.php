@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý tài khoản</h2>
            <a href="{{ route('admin.nguoidung.them') }}" class="btn btn-primary shadow-sm">
                <i class="fa-light fa-plus"></i> Thêm mới
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Họ và tên</th>
                            <th width="20%">Tên đăng nhập</th>
                            <th width="35%">Email</th>
                            <th width="10%">Quyền hạn</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nguoidung as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->role }}</td>
                                <td class="text-center"><a
                                        href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}"><i
                                            class="fa-light fa-edit"></i></a></td>
                                <td class="text-center"><a href="{{ route('admin.nguoidung.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa người dùng {{ $value->name }} không?')"><i
                                            class="fa-light fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
