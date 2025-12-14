@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa Carousel
            </div>
            <div class="card-body">
                <form action="{{ route('admin.carousel.sua', ['id' => $carousel->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="banner">Banner</label>
                        <input type="file" class="form-control @error('banner') is-invalid @enderror" id="banner"
                            name="banner">
                        @if ($carousel->banner)
                            <img src="{{ asset('uploads/carousel/' . $carousel->banner) }}" class="img-thumbnail mt-2"
                                style="max-width: 150px;" alt="{{ $carousel->tieude }}">
                        @endif
                        @error('banner')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tieude">Tiêu đề</label>
                        <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude"
                            name="tieude" value="{{ $carousel->tieude }}" required>
                        @error('tieude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mota">Mô tả</label>
                        <textarea class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota">{{ $carousel->mota }}</textarea>
                        @error('mota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="thutu">Thứ tự</label>
                        <input type="number" class="form-control @error('thutu') is-invalid @enderror" id="thutu"
                            name="thutu" value="{{ $carousel->thutu }}" required>
                        @error('thutu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="kichhoat" name="kichhoat" value="1"
                            {{ $carousel->kichhoat ? 'checked' : '' }}>
                        <label class="form-check-label" for="kichhoat">Kích hoạt</label>
                    </div>

                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fa-light fa-save me-1"></i> Cập nhật
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
