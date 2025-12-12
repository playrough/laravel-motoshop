@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa loại xe
            </div>
            <div class="card-body">
                <form action="{{ route('admin.loaixe.sua', ['id' => $loaixe->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tenloai">Tên loại</label>
                        <input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai"
                            name="tenloai" value="{{ $loaixe->tenloai }}" required>
                        @error('tenloai')
                            <div class="invalid-feedback">{{ $message }}</div>
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
