<?php

use App\Http\Controllers\DonHangController;
use App\Http\Controllers\HangXeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiXeController;
use App\Http\Controllers\QuanTriVienController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\XeMayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Trang dành cho khách chưa đăng nhập
Route::name('frontend.')->group(function () {
    // Trang chủ
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/home', [HomeController::class, 'getHome'])->name('home');

    // Trang xe máy
    Route::get('/xe-may', [HomeController::class, 'getTatCaXeMay'])->name('xemay');
    Route::get('/xe-may/{tenloai_slug}', [HomeController::class, 'getXeMay'])->name('xemay.phanloai');
    Route::get('/xe-may/{tenloai_slug}/{tenxe_slug}', [HomeController::class, 'getXeMay_ChiTiet'])->name('xemay.chitiet');
    Route::get('/xe-may-hang/{tenhang_slug}', [HomeController::class, 'getXeMayTheoHang'])
        ->name('xemay.phanhang');
    // Liên hệ
    Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('lienhe');
});

// Trang đăng ký/đăng nhập khách hàng
Route::get('/user/dang-ky', [HomeController::class, 'getDangKy'])->name('user.dangky');
Route::get('/user/dang-nhap', [HomeController::class, 'getDangNhap'])->name('user.dangnhap');

// Trang tài khoản khách hàng
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [KhachHangController::class, 'getHome'])->name('home');
    Route::get('/home', [KhachHangController::class, 'getHome'])->name('home');

    Route::get('/dat-hang', [KhachHangController::class, 'getDatHang'])->name('dathang');
    Route::post('/dat-hang', [KhachHangController::class, 'postDatHang'])->name('dathang');
    Route::get('/dat-hang-thanh-cong', [KhachHangController::class, 'getDatHangThanhCong'])->name('dathangthanhcong');

    Route::get('/don-hang', [KhachHangController::class, 'getDonHang'])->name('donhang');
    Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang'])->name('donhang.chitiet');
    Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang'])->name('donhang.chitiet');

    Route::get('/ho-so', [KhachHangController::class, 'getHoSo'])->name('hoso');
    Route::post('/ho-so', [KhachHangController::class, 'postHoSo'])->name('hoso');

    Route::get('/doi-mat-khau', [KhachHangController::class, 'getDoiMatKhau'])->name('doimatkhau');
    Route::post('/doi-mat-khau', [KhachHangController::class, 'postDoiMatKhau'])->name('doimatkhau');

    Route::post('/xoa-tai-khoan', [KhachHangController::class, 'postXoaTaiKhoan'])->name('xoataikhoan');

    Route::post('/dang-xuat', [KhachHangController::class, 'postDangXuat'])->name('dangxuat');
});

// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [QuanTriVienController::class, 'getHome'])->name('home');
    Route::get('/home', [QuanTriVienController::class, 'getHome'])->name('home');

    // Quản lý Loại xe
    Route::get('/loaixe', [LoaiXeController::class, 'getDanhSach'])->name('loaixe');
    Route::get('/loaixe/them', [LoaiXeController::class, 'getThem'])->name('loaixe.them');
    Route::post('/loaixe/them', [LoaiXeController::class, 'postThem'])->name('loaixe.them');
    Route::get('/loaixe/sua/{id}', [LoaiXeController::class, 'getSua'])->name('loaixe.sua');
    Route::post('/loaixe/sua/{id}', [LoaiXeController::class, 'postSua'])->name('loaixe.sua');
    Route::get('/loaixe/xoa/{id}', [LoaiXeController::class, 'getXoa'])->name('loaixe.xoa');

    // Quản lý Hãng xe
    Route::get('/hangxe', [HangXeController::class, 'getDanhSach'])->name('hangxe');
    Route::get('/hangxe/them', [HangXeController::class, 'getThem'])->name('hangxe.them');
    Route::post('/hangxe/them', [HangXeController::class, 'postThem'])->name('hangxe.them');
    Route::get('/hangxe/sua/{id}', [HangXeController::class, 'getSua'])->name('hangxe.sua');
    Route::post('/hangxe/sua/{id}', [HangXeController::class, 'postSua'])->name('hangxe.sua');
    Route::get('/hangxe/xoa/{id}', [HangXeController::class, 'getXoa'])->name('hangxe.xoa');
    Route::post('/hangxe/nhap', [HangXeController::class, 'postNhap'])->name('hangxe.nhap');
    Route::get('/hangxe/xuat', [HangXeController::class, 'getXuat'])->name('hangxe.xuat');

    // Quản lý Xe máy
    Route::get('/xemay', [XeMayController::class, 'getDanhSach'])->name('xemay');
    Route::get('/xemay/them', [XeMayController::class, 'getThem'])->name('xemay.them');
    Route::post('/xemay/them', [XeMayController::class, 'postThem'])->name('xemay.them');
    Route::get('/xemay/sua/{id}', [XeMayController::class, 'getSua'])->name('xemay.sua');
    Route::post('/xemay/sua/{id}', [XeMayController::class, 'postSua'])->name('xemay.sua');
    Route::get('/xemay/xoa/{id}', [XeMayController::class, 'getXoa'])->name('xemay.xoa');
    Route::post('/xemay/nhap', [XeMayController::class, 'postNhap'])->name('xemay.nhap');
    Route::get('/xemay/xuat', [XeMayController::class, 'getXuat'])->name('xemay.xuat');

    // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
    Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');

    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');

    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung');
    Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them');
    Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them');
    Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua');
    Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua');
    Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getXoa'])->name('nguoidung.xoa');
});
