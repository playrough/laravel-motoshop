@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fa-light fa-plus me-2"></i> Thêm Carousel
            </div>
            <div class="card-body">

                {{-- Hiển thị tất cả lỗi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6 class="fw-semibold">Có lỗi xảy ra:</h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.carousel.them') }}" method="post" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="banner">Banner</label>
                        <input type="file" class="form-control @error('banner') is-invalid @enderror" id="banner"
                            name="banner" required>
                        @error('banner')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tieude">Tiêu đề</label>
                        <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude"
                            name="tieude" value="{{ old('tieude') }}" required>
                        @error('tieude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mota">Mô tả</label>
                        <textarea class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota">{{ old('mota') }}</textarea>
                        @error('mota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="thutu">Thứ tự</label>
                        <input type="number" class="form-control @error('thutu') is-invalid @enderror" id="thutu"
                            name="thutu" value="{{ old('thutu', 1) }}" required>
                        @error('thutu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="kichhoat" name="kichhoat" value="1"
                            checked>
                        <label class="form-check-label" for="kichhoat">Kích hoạt</label>
                    </div>

                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="fa-light fa-save me-1"></i> Thêm vào CSDL
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
