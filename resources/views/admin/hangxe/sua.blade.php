@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa hãng xe
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hangxe.sua', ['id' => $hangxe->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tenhang">Tên hãng xe</label>
                        <input type="text" class="form-control @error('tenhang') is-invalid @enderror" id="tenhang"
                            name="tenhang" value="{{ $hangxe->tenhang }}" required>
                        @error('tenhang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="hinhanh">Hình ảnh</label>
                        @if (!empty($hangxe->hinhanh))
                            <img src="{{ asset('storage/' . $hangxe->hinhanh) }}" width="100" class="img-thumbnail" />
                            <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                        @endif
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                            name="hinhanh" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fa-light fa-save me-1"></i> Cập nhật
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
