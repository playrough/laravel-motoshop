@extends('layouts.app')

@section('title', 'Trang chủ quản trị')

@section('content')
    <div class="container py-4">

        {{-- Tiêu đề và thông tin user --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Bảng điều khiển</h2>

            <!-- Avatar -->
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center"
                    style="width: 60px; height: 60px; font-size: 1.5rem;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="ps-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                </div>
            </div>

        </div>

        {{-- Dòng thống kê --}}
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100" style="background-color: #F5E0DC;">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted small mb-2">Tổng số xe</h6>
                        <h3 class="fw-bold">{{ $tongxe ?? 120 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100" style="background-color: #F2CDCD;">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted small mb-2">Đơn hàng</h6>
                        <h3 class="fw-bold">{{ $donhang ?? 35 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100" style="background-color: #DAD0FF;">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted small mb-2">Người dùng</h6>
                        <h3 class="fw-bold">{{ $nguoidung ?? 10 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100" style="background-color: #B5E8E0;">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted small mb-2">Tin nhắn hỗ trợ</h6>
                        <h3 class="fw-bold">{{ $tinnhan ?? 5 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hai box nội dung --}}
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100" style="background-color: #FFF5BA;"> {{-- vàng nhạt --}}
                    <div class="card-header fw-semibold" style="background-color: #FFE6A7;">Hoạt động gần đây</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush small">
                            @foreach ($nguoidungmoi as $user)
                                <li class="list-group-item" style="background-color: #FFF9E5;">
                                    Người dùng mới đăng ký: <b>{{ $user->name }}</b>
                                </li>
                            @endforeach
                            @foreach ($donhangmoi as $dh)
                                <li class="list-group-item" style="background-color: #FFF9E5;">
                                    Đơn hàng #{{ $dh->id }} vừa tạo bởi <b>{{ $dh->User->name }}</b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100" style="background-color: #D0F4DE;"> {{-- xanh mint nhạt --}}
                    <div class="card-header fw-semibold" style="background-color: #A7E3C4;">Thông báo hệ thống</div>
                    <div class="card-body">
                        <p class="small">Mọi thứ hoạt động ổn định. Không có cảnh báo mới.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
