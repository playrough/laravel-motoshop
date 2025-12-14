<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\DanhGia;
use App\Models\HangXe;
use App\Models\LoaiXe;
use App\Models\User;
use App\Models\XeMay;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

        $danhgia = DanhGia::with('user', 'xemay')
            ->latest() // order by created_at desc
            ->take(3)
            ->get();

        $carousels = Carousel::where('kichhoat', 1)
            ->orderBy('thutu', 'asc')
            ->get();

        return view('frontend.home', compact('loaixe', 'hangxe', 'danhgia', 'carousels'));
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

    // Chuyển tới màn hình Đăng nhập bằng Google
    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý phản hồi sau khi đăng nhập thành công ở Google
    public function getGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->stateless()
                ->user();
        } catch (Exception $e) {
            return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);

            return redirect()->route('frontend.home');
        } else {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => Str::before($user->email, '@'),
                'password' => Hash::make('motoshop@2025'), // Gán mật khẩu tự do
            ]);
            // Sau đó đăng nhập
            Auth::login($newUser, true);

            return redirect()->route('user.home');
        }
    }

    public function getDanhGia($tenxe_slug = null)
    {
        $query = DanhGia::with(['user', 'xemay'])
            ->where('kiemduyet', 1)
            ->where('kichhoat', 1)
            ->orderBy('created_at', 'desc');

        $xemay = null;

        // Nếu có slug xe → lọc theo xe
        if ($tenxe_slug) {
            $xemay = XeMay::where('tenxe_slug', $tenxe_slug)->firstOrFail();

            $query->where('xemay_id', $xemay->id);
        }

        $danhgia = $query->paginate(9);

        return view('frontend.danhgia', compact('danhgia', 'xemay'));
    }

    public function getTuyenDung()
    {
        return view('frontend.tuyendung');
    }
}
