<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\User;
use App\Models\XeMay;
use Illuminate\Support\Facades\Auth;

class QuanTriVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getHome()
    {
        // User đang đăng nhập
        $user = Auth::user();

        // Lấy dữ liệu thống kê ví dụ
        $tongxe = XeMay::count();
        $donhang = DonHang::count();
        $nguoidung = User::count();
        $tinnhan = 0;

        $nguoidungmoi = User::orderBy('created_at', 'desc')->take(5)->get();

        $donhangmoi = DonHang::with('XeMay', 'User')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.home', compact(
            'user', 'tongxe', 'donhang', 'nguoidung', 'tinnhan', 'nguoidungmoi', 'donhangmoi'
        ));
    }
}
