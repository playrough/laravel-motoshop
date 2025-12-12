@extends('layouts.frontend')

@section('title', 'Đăng ký tài khoản')

@section('css')
    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #dbeafe);
        }

        .register-wrapper {
            max-width: 480px;
            margin: 60px auto;
            padding: 40px;
            border-radius: 18px;
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        }

        .form-control-lg {
            padding: 14px 18px;
            border-radius: 12px;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #6366f1, #4338ca);
            border: none;
            padding: 14px;
            border-radius: 12px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            transition: 0.25s;
        }

        .btn-gradient:hover {
            opacity: 0.85;
            transform: translateY(-2px);
        }

        .auth-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #4f46e5, #4338ca);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: #6b7280;
        }

        .social-btn {
            border-radius: 12px !important;
            padding: 12px;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="register-wrapper">

            <!-- TITLE -->
            <h1 class="auth-title text-center">Tạo tài khoản mới</h1>
            <p class="text-center text-muted mb-4">
                Nhanh chóng – Bảo mật – Dễ sử dụng
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                @csrf

                <!-- Họ tên -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Họ và tên</label>
                    <input type="text" name="name"
                        class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mật khẩu</label>
                    <input type="password" name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" minlength="8"
                        required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation"
                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                        minlength="8" required>
                </div>

                <!-- Điều khoản -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="privacy" required>
                    <label class="form-check-label" for="privacy">
                        Tôi đồng ý với <a href="#" class="text-primary">Chính sách bảo mật</a>.
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-gradient w-100">
                    Đăng ký
                </button>
            </form>

            <!-- DIVIDER -->
            <div class="divider">hoặc đăng nhập bằng</div>

            <!-- SOCIAL -->
            <div class="d-flex flex-column flex-sm-row gap-3">
                <a href="#" class="btn btn-outline-secondary social-btn w-100">
                    <i class="fab fa-google me-2"></i> Google
                </a>
                <a href="#" class="btn btn-outline-secondary social-btn w-100">
                    <i class="fab fa-facebook me-2"></i> Facebook
                </a>
            </div>

            <!-- LINK LOGIN -->
            <p class="text-center mt-4">
                Đã có tài khoản?
                <a href="{{ route('user.dangnhap') }}" class="text-primary fw-semibold">Đăng nhập</a>
            </p>
        </div>
    </div>
@endsection
