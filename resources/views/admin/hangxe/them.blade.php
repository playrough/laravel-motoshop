@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fa-light fa-plus me-2"></i> Thêm hãng xe
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hangxe.them') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tenhang">Tên hãng</label>
                        <input type="text" class="form-control @error('tenhang') is-invalid @enderror" id="tenhang"
                            name="tenhang" value="{{ old('tenhang') }}" required>
                        @error('tenhang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="hinhanh">Hình ảnh</label>
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                            name="hinhanh" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="fa-light fa-save me-1"></i> Thêm vào CSDL
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
