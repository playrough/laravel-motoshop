@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fa-light fa-edit me-2"></i> Sửa tình trạng đơn hàng
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tinhtrang.sua', ['id' => $tinhtrang->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tinhtrang">Tên tình trạng</label>
                        <input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang"
                            name="tinhtrang" value="{{ $tinhtrang->tinhtrang }}" required />
                        @error('tinhtrang')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
                </form>
            </div>
        </div>

    </div>
@endsection
