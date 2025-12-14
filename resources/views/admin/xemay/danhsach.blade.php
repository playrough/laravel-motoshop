@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý xe máy</h2>
            <div>
                <a href="{{ route('admin.xemay.them') }}" class="btn btn-primary shadow-sm">
                    <i class="fa-light fa-plus"></i> Thêm mới
                </a>
                <a href="#nhap" class="btn btn-warning shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fa-light fa-upload"></i> Nhập từ Excel
                </a>
                <a href="{{ route('admin.xemay.xuat') }}" class="btn btn-success shadow-sm">
                    <i class="fa-light fa-download"></i> Xuất ra Excel
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            {{ $xemay->links() }}
            <div class="card-body table-responsive p-0">

                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th style="width:3%">#</th>
                            <th style="width:8%">Hình</th>
                            <th style="width:12%">Tên xe</th>
                            <th style="width:8%">Loại</th>
                            <th style="width:8%">Hãng</th>
                            <th style="width:4%">SL</th>
                            <th style="width:8%">Đơn giá</th>
                            <th style="width:8%">Động cơ</th>
                            <th style="width:10%">Dung tích</th>
                            <th style="width:6%">Năm</th>
                            <th style="width:4%">Màu</th>
                            <th style="width:15%">Mô tả</th>
                            <th style="width:4%">Sửa</th>
                            <th style="width:4%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($xemay as $value)
                            <tr class="align-middle">
                                <td>{{ $xemay->firstItem() + $loop->index }}</td>
                                <td class="align-middle text-center">
                                    <img src="{{ asset('storage/' . $value->hinhanh) }}" width="80"
                                        class="img-thumbnail" />
                                </td>
                                <td class="fw-semibold">{{ $value->tenxe }}</td>
                                <td>{{ $value->LoaiXe->tenloai }}</td>
                                <td>{{ $value->HangXe->tenhang }}</td>
                                <td>{{ $value->soluong }}</td>
                                <td>{{ number_format($value->dongia) }}</td>
                                <td>{{ $value->dongco }}</td>
                                <td>{{ $value->dungtich }}</td>
                                <td>{{ $value->namsanxuat }}</td>
                                <td>{{ $value->mausac }}</td>
                                <td>{{ $value->mota }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.xemay.sua', ['id' => $value->id]) }}" class="text-warning">
                                        <i class="fa-light fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.xemay.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa xe {{ $value->tenxe }} không?')"
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

        <div class="mt-4">
            {{ $xemay->links() }}
        </div>

    </div>



    <form action="{{ route('admin.xemay.nhap') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-0">
                            <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                            <input type="file" class="form-control @error('file_excel') is-invalid @enderror"
                                id="file_excel" name="file_excel" required />
                            @error('file_excel')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fa-light fa-times"></i> Hủy bỏ</button>
                        <button type="submit" class="btn btn-danger"><i class="fa-light fa-upload"></i> Nhập dữ
                            liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
    @error('file_excel')
        <script>
            const importModal = new bootstrap.Modal(document.getElementById('importModal'));
            importModal.show();
        </script>
    @enderror
@endsection
