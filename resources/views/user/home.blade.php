@extends('layouts.frontend')

@section('title', 'Hồ sơ khách hàng')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">

                <!-- SIDEBAR -->
                <aside class="col-lg-3 mb-4 mb-lg-0">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <!-- Avatar -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center"
                                    style="width: 60px; height: 60px; font-size: 1.5rem;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div class="ps-3">
                                    <h6 class="mb-0">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>

                            <!-- Nav -->
                            <ul class="list-unstyled mt-4">
                                <li class="mb-2">
                                    <a href="{{ route('user.hoso') }}" class="text-decoration-none fw-medium text-primary">
                                        <i class="bi bi-person-fill me-2"></i> Hồ sơ cá nhân
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('user.donhang') }}" class="text-decoration-none text-dark">
                                        <i class="bi bi-bag-fill me-2"></i> Đơn hàng ({{ $user->DonHang->count() }})
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <i class="bi bi-heart-fill me-2"></i> Sản phẩm yêu thích
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <i class="bi bi-geo-alt-fill me-2"></i> Sổ địa chỉ
                                    </a>
                                </li>
                                <li class="mt-4 pt-2 border-top">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="text-danger text-decoration-none fw-medium">
                                        <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </div>
                </aside>

                <!-- MAIN CONTENT -->
                <div class="col-lg-9">

                    <!-- Cập nhật hồ sơ -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Thông tin cá nhân</h5>
                        </div>
                        <div class="card-body">

                            @if (session('warning'))
                                <div class="alert alert-danger">{{ session('warning') }}</div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('user.hoso') }}" method="post" class="row g-3" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}" required>
                                    <div class="invalid-feedback">Tên không được để trống</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required>
                                    <div class="invalid-feedback">Email không hợp lệ</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Đổi mật khẩu -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Đổi mật khẩu</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.doimatkhau') }}" method="post" class="row g-3">
                                @csrf

                                <div class="col-md-6">
                                    <label class="form-label">Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="new_password" required>
                                    <div class="invalid-feedback">Email không hợp lệ</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary">Đổi mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Xóa tài khoản -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-danger">Xóa tài khoản</h6>
                            <p class="text-muted small">
                                Khi xóa tài khoản, dữ liệu sẽ bị vô hiệu hoá trong 14 ngày trước khi xoá vĩnh viễn.
                            </p>
                            <a href="#" class="text-danger fw-medium">Xác nhận xóa tài khoản</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection
