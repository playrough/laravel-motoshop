@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fa-light fa-plus me-2"></i> Thêm tình trạng đơn hàng
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tinhtrang.them') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tinhtrang">Tên tình trạng</label>
                        <input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang"
                            name="tinhtrang" value="{{ old('tinhtrang') }}" required />
                        @error('tinhtrang')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Thêm vào CSDL</button>
                </form>
            </div>
        </div>

    </div>
@endsection
