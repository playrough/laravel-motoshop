@extends('layouts.frontend')

@section('title', 'Tuyển dụng')

@section('content')
    <div class="container py-5">

        {{-- HERO --}}
        <div class="text-center mb-5">
            <h1 class="fw-bold">Cơ hội nghề nghiệp</h1>
            <p class="text-muted fs-5">
                Gia nhập đội ngũ của chúng tôi – cùng nhau phát triển bền vững
            </p>
        </div>

        {{-- GIỚI THIỆU --}}
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h3 class="fw-semibold mb-3">Vì sao nên làm việc cùng chúng tôi?</h3>
                <ul class="list-unstyled">
                    <li class="mb-2">✔ Môi trường làm việc chuyên nghiệp, thân thiện</li>
                    <li class="mb-2">✔ Lộ trình phát triển & thăng tiến rõ ràng</li>
                    <li class="mb-2">✔ Thu nhập cạnh tranh, thưởng theo hiệu quả</li>
                    <li class="mb-2">✔ Đào tạo kỹ năng & hỗ trợ lâu dài</li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/hire.jpg') }}" class="img-fluid rounded shadow-sm" alt="Tuyển dụng">
            </div>
        </div>

        {{-- VỊ TRÍ TUYỂN DỤNG --}}
        <h3 class="fw-semibold mb-4">Vị trí đang tuyển</h3>

        <div class="row g-4">

            {{-- KỸ THUẬT --}}
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">🔧 Nhân viên kỹ thuật</h5>
                        <p class="text-muted mb-2">Số lượng: 02</p>

                        <strong>Mô tả công việc:</strong>
                        <ul>
                            <li>Sửa chữa, bảo dưỡng xe máy</li>
                            <li>Kiểm tra kỹ thuật trước khi bàn giao</li>
                        </ul>

                        <strong>Yêu cầu:</strong>
                        <ul>
                            <li>Có kiến thức cơ bản về xe máy</li>
                            <li>Chăm chỉ, trung thực</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- BÁN HÀNG --}}
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">🧾 Nhân viên bán hàng</h5>
                        <p class="text-muted mb-2">Số lượng: 03</p>

                        <strong>Mô tả công việc:</strong>
                        <ul>
                            <li>Tư vấn sản phẩm cho khách hàng</li>
                            <li>Hỗ trợ chốt đơn, theo dõi đơn hàng</li>
                        </ul>

                        <strong>Yêu cầu:</strong>
                        <ul>
                            <li>Giao tiếp tốt, thái độ tích cực</li>
                            <li>Ưu tiên có kinh nghiệm bán hàng</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        {{-- QUYỀN LỢI --}}
        <div class="mt-5">
            <h3 class="fw-semibold mb-3">Quyền lợi</h3>
            <div class="row g-3">
                <div class="col-md-4">✔ Lương cứng + thưởng + hoa hồng</div>
                <div class="col-md-4">✔ Đóng BHXH đầy đủ</div>
                <div class="col-md-4">✔ Nghỉ lễ, phép năm theo luật</div>
                <div class="col-md-4">✔ Du lịch & team building</div>
                <div class="col-md-4">✔ Đào tạo nâng cao kỹ năng</div>
                <div class="col-md-4">✔ Môi trường ổn định, lâu dài</div>
            </div>
        </div>

        {{-- ỨNG TUYỂN --}}
        <div class="mt-5 p-4 bg-light rounded shadow-sm text-center">
            <h4 class="fw-bold mb-3">Ứng tuyển ngay</h4>
            <p>
                Gửi CV về email:
                <strong>tuyendung@motoshop.vn</strong>
            </p>
            <p>
                Hotline: <strong>0123 456 789</strong>
            </p>
            <p class="text-muted mb-0">
                Chúng tôi sẽ liên hệ trong vòng 3–5 ngày làm việc
            </p>
        </div>

    </div>
@endsection
