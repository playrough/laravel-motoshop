@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa hãng xe
            </div>
            <div class="card-body">
                <form action="{{ route('admin.xemay.sua', ['id' => $xemay->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="loaixe_id">Loại xe</label>
                        <select class="form-select @error('loaixe_id') is-invalid @enderror" id="loaixe_id" name="loaixe_id"
                            required>
                            <option value="">-- Chọn --</option>
                            @foreach ($loaixe as $value)
                                <option value="{{ $value->id }}" {{ $xemay->loaixe_id == $value->id ? 'selected' : '' }}>
                                    {{ $value->tenloai }}</option>
                            @endforeach
                        </select>
                        @error('loaixe_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="hangxe_id">Hãng xe</label>
                        <select class="form-select @error('hangxe_id') is-invalid @enderror" id="hangxe_id" name="hangxe_id"
                            required>
                            <option value="">-- Chọn --</option>
                            @foreach ($hangxe as $value)
                                <option value="{{ $value->id }}" {{ $xemay->hangxe_id == $value->id ? 'selected' : '' }}>
                                    {{ $value->tenhang }}</option>
                            @endforeach
                        </select>
                        @error('hangxe_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tenxe">Tên xe</label>
                        <input type="text" class="form-control @error('tenxe') is-invalid @enderror" id="tenxe"
                            name="tenxe" value="{{ $xemay->tenxe }}" required />
                        @error('tenxe')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="soluong">Số lượng</label>
                        <input type="number" min="0" class="form-control @error('soluong') is-invalid @enderror"
                            id="soluong" name="soluong" value="{{ $xemay->soluong }}" required />
                        @error('soluong')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="dongia">Đơn giá</label>
                        <input type="number" min="0" class="form-control @error('dongia') is-invalid @enderror"
                            id="dongia" name="dongia" value="{{ $xemay->dongia }}" required />
                        @error('dongia')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="hinhanh">Hình ảnh xe máy</label>
                        @if (!empty($xemay->hinhanh))
                            <img class="d-block rounded img-thumbnail" src="{{ asset('storage/' . $xemay->hinhanh) }}"
                                width="100" />
                            <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                        @endif
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                            name="hinhanh" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mota">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="mota" name="mota">{{ $xemay->mota }}</textarea>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="dongco">Động cơ</label>
                        <input type="text" class="form-control @error('dongco') is-invalid @enderror" id="dongco"
                            name="dongco" value="{{ $xemay->dongco }}" />
                        @error('dongco')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="dungtich">Dung tích</label>
                        <input type="text" class="form-control @error('dungtich') is-invalid @enderror" id="dungtich"
                            name="dungtich" value="{{ $xemay->dungtich }}" />
                        @error('dungtich')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="namsanxuat">Năm sản xuất</label>
                        <input type="text" class="form-control @error('namsanxuat') is-invalid @enderror" id="namsanxuat"
                            name="namsanxuat" value="{{ $xemay->namsanxuat }}" />
                        @error('namsanxuat')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mausac">Màu sắc</label>
                        <input type="text" class="form-control @error('mausac') is-invalid @enderror" id="mausac"
                            name="mausac" value="{{ $xemay->mausac }}" />
                        @error('mausac')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
                </form>
            </div>
        </div>

    </div>
@endsection
