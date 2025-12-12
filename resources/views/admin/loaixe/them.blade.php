@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fa-light fa-plus me-2"></i> Thêm loại xe
            </div>
            <div class="card-body">
                <form action="{{ route('admin.loaixe.them') }}" method="post" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tenloai">Tên loại</label>
                        <input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai"
                            name="tenloai" value="{{ old('tenloai') }}" required>
                        @error('tenloai')
                            <div class="invalid-feedback">{{ $message }}</div>
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
