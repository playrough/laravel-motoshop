@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý đơn hàng</h2>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Khách hàng</th>
                            <th width="45%">Thông tin giao hàng</th>
                            <th width="15%">Ngày đặt</th>
                            <th width="10%">Tình trạng</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donhang as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->User->name }}</td>
                                <td>
                                    <span class="d-block">Điện thoại:
                                        <strong>{{ $value->dienthoaigiaohang }}</strong></span>
                                    <span class="d-block">Địa chỉ: <strong>{{ $value->diachigiaohang }}</strong></span>
                                    <span class="d-block">Sản phẩm: <strong>{{ $value->XeMay->tenxe }}</strong></span>
                                    <span class="d-block">Đơn giá:
                                        <strong>{{ number_format($value->dongia, 0, ',', '.') }}</strong>đ</span>
                                    <span class="d-block">Thành tiền:
                                        <strong>{{ number_format($value->dongia, 0, ',', '.') }}</strong>đ</span>

                                </td>
                                <td>{{ $value->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $value->TinhTrang->tinhtrang }}</td>
                                <td class="text-center"><a href="{{ route('admin.donhang.sua', ['id' => $value->id]) }}"><i
                                            class="fa-light fa-edit"></i></a></td>
                                <td class="text-center"><a href="{{ route('admin.donhang.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa đơn hàng của khách {{ $value->User->name }} không?')"><i
                                            class="fa-light fa-trash-alt text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
