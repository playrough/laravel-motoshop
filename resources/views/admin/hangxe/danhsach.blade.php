@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Quản lý hãng xe</h2>
            <div>
                <a href="{{ route('admin.hangxe.them') }}" class="btn btn-primary shadow-sm">
                    <i class="fa-light fa-plus"></i> Thêm mới
                </a>
                <a href="#nhap" class="btn btn-warning shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                    <i class="fa-light fa-upload"></i> Nhập từ Excel
                </a>
                <a href="{{ route('admin.hangxe.xuat') }}" class="btn btn-success shadow-sm">
                    <i class="fa-light fa-download"></i> Xuất ra Excel
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Hình ảnh</th>
                            <th width="45%">Tên hãng sản xuất</th>
                            <th width="30%">Tên hãng sản xuất không dấu</th>
                            <th width="5%" class="text-center">Sửa</th>
                            <th width="5%" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hangxe as $value)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">
                                    <img src="{{ asset('storage/' . $value->hinhanh) }}" width="100"
                                        class="img-thumbnail" />
                                </td>
                                <td class="fw-semibold">{{ $value->tenhang }}</td>
                                <td class="text-muted">{{ $value->tenhang_slug }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.hangxe.sua', ['id' => $value->id]) }}" class="text-warning">
                                        <i class="fa-light fa-edit fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.hangxe.xoa', ['id' => $value->id]) }}"
                                        onclick="return confirm('Bạn có muốn xóa loại xe {{ $value->tenhang }} không?')"
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

    <form action="{{ route('admin.hangxe.nhap') }}" method="post" enctype="multipart/form-data">
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
