@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa đánh giá
            </div>
            <div class="card-body">
                <form action="{{ route('admin.danhgia.sua', ['id' => $danhgia->id]) }}" method="post">
                    @csrf

                    <!-- Chọn Xe máy -->
                    <div class="mb-3">
                        <label class="form-label" for="xemay_id">Xe máy</label>
                        <select class="form-select @error('xemay_id') is-invalid @enderror" id="xemay_id" name="xemay_id"
                            required>
                            <option value="">-- Chọn xe máy --</option>
                            @foreach ($xemay as $xm)
                                <option value="{{ $xm->id }}" {{ $danhgia->xemay_id == $xm->id ? 'selected' : '' }}>
                                    {{ $xm->tenxe }}
                                </option>
                            @endforeach
                        </select>
                        @error('xemay_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Chọn người dùng -->
                    <div class="mb-3">
                        <label class="form-label" for="user_id">Người đánh giá</label>
                        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id"
                            required>
                            <option value="">-- Chọn người dùng --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $danhgia->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tiêu đề đánh giá -->
                    <div class="mb-3">
                        <label class="form-label" for="tieude">Tiêu đề</label>
                        <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude"
                            name="tieude" value="{{ old('tieude', $danhgia->tieude) }}" maxlength="300" required>
                        @error('tieude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Số sao -->
                    <div class="mb-3">
                        <label class="form-label" for="sosao">Số sao</label>
                        <input type="number" class="form-control @error('sosao') is-invalid @enderror" id="sosao"
                            name="sosao" value="{{ $danhgia->sosao }}" min="1" max="5" required>
                        @error('sosao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nội dung đánh giá -->
                    <div class="mb-3">
                        <label class="form-label" for="noidung">Nội dung đánh giá</label>
                        <textarea class="form-control @error('noidung') is-invalid @enderror" id="noidung" name="noidung" rows="4"
                            required>{{ $danhgia->noidung }}</textarea>
                        @error('noidung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Trạng thái duyệt -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="kiemduyet" name="kiemduyet" value="1"
                            {{ $danhgia->kiemduyet ? 'checked' : '' }}>
                        <label class="form-check-label" for="kiemduyet">Đã duyệt</label>
                    </div>


                    <!-- Trạng thái kích hoạt -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="kichhoat" name="kichhoat" value="1"
                            {{ $danhgia->kichhoat ? 'checked' : '' }}>
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
