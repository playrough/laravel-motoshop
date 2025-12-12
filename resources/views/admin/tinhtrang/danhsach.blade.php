@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý tình trạng đơn hàng</h2>

            <div>
                <a href="{{ route('admin.tinhtrang.them') }}" class="btn btn-primary shadow-sm">
                    <i class="fa-light fa-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="85%">Tên tình trạng</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tinhtrang as $value)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->tinhtrang }}</td>
                                <td class="text-center"><a
                                        href="{{ route('admin.tinhtrang.sua', ['id' => $value->id]) }}"><i
                                            class="fa-light fa-edit"></i></a></td>
                                <td class="text-center"><a href="{{ route('admin.tinhtrang.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa tình trạng đơn hàng {{ $value->tinhtrang }} không?')"><i
                                            class="fa-light fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
