@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fa-light fa-plus me-2"></i> Thêm Đánh giá
            </div>

            <div class="card-body">
                <form action="{{ route('admin.danhgia.them') }}" method="post" class="needs-validation">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="user_id">Người đánh giá</label>
                        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                            required>
                            <option value="">-- Chọn người dùng --</option>
                            @foreach ($users as $us)
                                <option value="{{ $us->id }}" {{ old('us') == $us->id ? 'selected' : '' }}>
                                    {{ $us->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="xemay_id">Xe máy</label>
                        <select class="form-select @error('xemay_id') is-invalid @enderror" id="xemay_id" name="xemay_id"
                            required>
                            <option value="">-- Chọn xe máy --</option>
                            @foreach ($xemay as $xe)
                                <option value="{{ $xe->id }}" {{ old('xemay_id') == $xe->id ? 'selected' : '' }}>
                                    {{ $xe->tenxe }}
                                </option>
                            @endforeach
                        </select>
                        @error('xemay_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tiêu đề đánh giá --}}
                    <div class="mb-3">
                        <label class="form-label" for="tieude">Tiêu đề</label>
                        <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude"
                            name="tieude" value="{{ old('tieude') }}" required>
                        @error('tieude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="sosao">Số sao</label>
                        <input type="number" min="1" max="5"
                            class="form-control @error('sosao') is-invalid @enderror" id="sosao" name="sosao"
                            value="{{ old('sosao') }}" required>
                        @error('sosao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="noidung">Nội dung đánh giá</label>
                        <textarea class="form-control @error('noidung') is-invalid @enderror" id="noidung" name="noidung" rows="4"
                            required>{{ old('noidung') }}</textarea>
                        @error('noidung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kiemduyet">Trạng thái duyệt</label>
                        <select class="form-select @error('kiemduyet') is-invalid @enderror" id="kiemduyet" name="kiemduyet"
                            required>
                            <option value="1" {{ old('kiemduyet', 1) == 1 ? 'selected' : '' }}>Đã duyệt</option>
                            <option value="0" {{ old('kiemduyet') == 0 ? 'selected' : '' }}>Chưa duyệt</option>
                        </select>
                        @error('kiemduyet')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Trạng thái kích hoạt -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="kichhoat" name="kichhoat" value="1"
                            {{ old('kichhoat', 1) ? 'checked' : '' }}>
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
