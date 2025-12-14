@extends('layouts.frontend')

@section('title', 'Đăng nhập')

@section('css')
    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #dbeafe);
        }

        .login-wrapper {
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

        .password-toggle {
            position: relative;
        }

        .password-toggle button {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            font-size: 18px;
            color: #6b7280;
        }
    </style>
@endsection


@section('content')
    <div class="container py-4">
        <div class="login-wrapper">

            <!-- TITLE -->
            <h1 class="auth-title text-center">Đăng nhập</h1>
            <p class="text-center text-muted mb-4">
                Chào mừng bạn quay lại!
            </p>

            <!-- WARNING MESSAGE -->
            @if (session('warning'))
                <div class="alert alert-danger d-flex">
                    <i class="ci-banned fs-lg me-2"></i>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf

                <!-- Email / Username / Phone -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email / Tên đăng nhập / SĐT</label>
                    <input type="text" name="email"
                        class="form-control form-control-lg {{ $errors->has('email') || $errors->has('username') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}" required>
                    @if ($errors->has('email') || $errors->has('username'))
                        <div class="invalid-feedback d-block">Tên đăng nhập không đúng!</div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Mật khẩu</label>
                    <div class="password-toggle">
                        <input type="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            autocomplete="current-password" required>
                        <button type="button" onclick="togglePassword(this)">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-primary fw-semibold" href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-gradient w-100">Đăng nhập</button>
            </form>

            <!-- DIVIDER -->
            <div class="divider">hoặc đăng nhập bằng</div>

            <!-- SOCIAL -->
            <div class="d-flex flex-column flex-sm-row gap-3">
                <a href="{{ route('google.login') }}"
                    class="btn btn-outline-secondary social-btn w-100 d-flex align-items-center">
                    <i class="fab fa-google me-2"></i> Google
                </a>
                <a href="#" class="btn btn-outline-secondary social-btn w-100 d-flex align-items-center">
                    <i class="fab fa-facebook me-2"></i> Facebook
                </a>
                <a href="#" class="btn btn-outline-secondary social-btn w-100 d-flex align-items-center">
                    <i class="fab fa-apple me-2"></i> Apple
                </a>
            </div>

            <p class="text-center mt-4">
                Chưa có tài khoản?
                <a href="{{ route('user.dangky') }}" class="text-primary fw-semibold">Đăng ký ngay</a>
            </p>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword(btn) {
            const input = btn.parentElement.querySelector("input");
            const icon = btn.querySelector("i");
            input.type = input.type === "password" ? "text" : "password";
            icon.classList.toggle("fa-eye");
            icon.classList.toggle("fa-eye-slash");
        }
    </script>
@endsection
