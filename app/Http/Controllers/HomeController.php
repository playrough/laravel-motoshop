<?php

namespace App\Http\Controllers;

use App\Models\HangXe;
use App\Models\LoaiXe;
use App\Models\XeMay;

class HomeController extends Controller
{
    public function getHome()
    {
        $loaixe = LoaiXe::with([
            'XeMay' => function ($query) {
                $query->latest()->take(8);
            },
        ])->get();

        $hangxe = HangXe::orderBy('tenhang')->get();

        return view('frontend.home', compact('loaixe', 'hangxe'));
    }

    public function getTatCaXeMay()
    {
        // Lấy tất cả xe máy, kèm thông tin hãng và loại xe
        $xemay = XeMay::with(['HangXe', 'LoaiXe'])
            ->latest()        // sắp xếp mới nhất lên đầu
            ->paginate(16);   // phân trang 16 xe mỗi trang

        return view('frontend.xemay', compact('xemay'));
    }

    public function getXeMay($tenloai_slug = '')
    {
        // 1) Lấy loại xe theo slug
        $loaixe = LoaiXe::where('tenloai_slug', $tenloai_slug)->firstOrFail();

        // 2) Lấy tất cả xe máy thuộc loại này, kèm hãng
        $xemay = $loaixe->XeMay()->with('HangXe')->latest()->paginate(12);

        // 3) Trả về view với dữ liệu
        return view('frontend.xemay_loai', compact('loaixe', 'xemay'));
    }

    public function getXeMayTheoHang($tenhang_slug = '')
    {
        // 1) Lấy hãng xe theo slug
        $hangxe = HangXe::where('tenhang_slug', $tenhang_slug)->firstOrFail();

        // 2) Lấy tất cả xe máy thuộc hãng này, kèm thông tin loại xe
        $xemay = $hangxe->XeMay()->with('LoaiXe')->latest()->paginate(12);

        // 3) Trả về view với dữ liệu
        return view('frontend.xemay_hang', compact('hangxe', 'xemay'));
    }

    public function getXeMay_ChiTiet($tenloai_slug, $tenxe_slug)
    {
        // 1) Lấy loại xe theo slug
        $loaixe = LoaiXe::where('tenloai_slug', $tenloai_slug)->firstOrFail();

        // 2) Lấy xe theo slug + thuộc về loại
        $xemay = $loaixe->XeMay()
            ->where('tenxe_slug', $tenxe_slug)
            ->with(['HangXe'])
            ->firstOrFail();

        // 3) Lấy thêm vài xe đề xuất (cùng loại)
        $goiy = $loaixe->XeMay()
            ->where('id', '!=', $xemay->id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.xemay_chitiet', compact('loaixe', 'xemay', 'goiy'));
    }

    public function getLienHe()
    {
        return view('frontend.lienhe');
    }

    public function getDangKy()
    {
        return view('user.dangky');
    }

    public function getDangNhap()
    {
        return view('user.dangnhap');
    }
}
