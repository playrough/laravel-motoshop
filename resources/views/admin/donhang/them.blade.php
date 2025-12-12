@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa đơn hàng
            </div>
            <div class="card-body">
                <form action="{{ route('admin.donhang.them') }}" method="post">
                    @csrf

                    <!-- Khách hàng -->
                    <div class="mb-3">
                        <label class="form-label" for="user_id">Khách hàng (User ID)</label>
                        <input type="number" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                            name="user_id" value="{{ old('user_id') }}" placeholder="Nhập ID khách hàng" required>
                        @error('user_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Điện thoại giao hàng -->
                    <div class="mb-3">
                        <label class="form-label" for="dienthoaigiaohang">Điện thoại giao hàng</label>
                        <input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror"
                            id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ old('dienthoaigiaohang') }}"
                            required />
                        @error('dienthoaigiaohang')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Địa chỉ giao hàng -->
                    <div class="mb-3">
                        <label class="form-label" for="diachigiaohang">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control @error('diachigiaohang') is-invalid @enderror"
                            id="diachigiaohang" name="diachigiaohang" value="{{ old('diachigiaohang') }}" required />
                        @error('diachigiaohang')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Tình trạng đơn hàng -->
                    <div class="mb-3">
                        <label class="form-label" for="tinhtrang_id">Tình trạng đơn hàng</label>
                        <select class="form-select @error('tinhtrang_id') is-invalid @enderror" id="tinhtrang_id"
                            name="tinhtrang_id" required>
                            <option value="">-- Chọn --</option>

                            @foreach ($tinhtrang as $value)
                                <option value="{{ $value->id }}"
                                    {{ old('tinhtrang_id') == $value->id ? 'selected' : '' }}>
                                    {{ $value->tinhtrang }}
                                </option>
                            @endforeach
                        </select>
                        @error('tinhtrang_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa-light fa-save"></i> Thêm mới
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
