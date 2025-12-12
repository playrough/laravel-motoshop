@extends('layouts.frontend')

@section('title', 'Liên hệ')

@section('content')
    <div class="container py-5">

        <!-- Tiêu đề -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Liên hệ Motoshop</h2>
            <p class="text-muted">Nếu bạn có thắc mắc, vui lòng gửi tin nhắn hoặc ghé trực tiếp cửa hàng.</p>
        </div>

        <div class="row g-4">

            <!-- Form liên hệ -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">Gửi tin nhắn cho chúng tôi</h5>

                        <form method="post" action="#">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Họ và tên</label>
                                <input type="text" class="form-control" placeholder="Nhập họ tên của bạn" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" placeholder="example@gmail.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="0123 456 789" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nội dung</label>
                                <textarea class="form-control" rows="5" placeholder="Bạn cần tư vấn xe gì?..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Gửi liên hệ
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Thông tin cửa hàng -->
            <div class="col-lg-6">

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">Thông tin cửa hàng</h5>

                        <p class="mb-2"><i class="fa-light fa-location-dot me-2"></i> 123 Nguyễn Trãi, Hà Nội</p>
                        <p class="mb-2">
                            <i class="fa-light fa-phone me-2"></i>
                            <a href="tel:0123456789" class="text-decoration-none">0123 456 789</a>
                        </p>
                        <p class="mb-2">
                            <i class="fa-light fa-envelope me-2"></i>
                            <a href="mailto:support@motoshop.com" class="text-decoration-none">
                                support@motoshop.com
                            </a>
                        </p>
                        <p class="mb-2"><i class="fa-light fa-clock me-2"></i> Thứ 2 – Thứ 7: 08:00 – 18:00</p>

                    </div>
                </div>

                <!-- Google Map -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7335965234027!2d105.819454!3d21.003139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3eb2e02d2d%3A0xa74c0c3a1ad2c7f!2zMTIzIE5ndXnhu4VuIFRy4bqhaSwgSG_DoG5nIE3hu7kgQ2jDrSBNaW5oLCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1700000000000"
                            width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
