<?php

namespace App\Http\Controllers;

use App\Mail\DatHangThanhCongEmail;
use App\Models\DonHang;
use App\Models\User;
use App\Models\XeMay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getHome()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);

            return view('user.home', compact('user'));
        } else {
            return redirect()->route('user.dangnhap');
        }
    }

    public function getDatHang(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('user.dangnhap');
        }

        $xemay_id = $request->xemay;      // (?xemay=ID)
        $xemay = XeMay::findOrFail($xemay_id);

        return view('user.dathang', compact('xemay'));
    }

    public function postDatHang(Request $request)
    {
        $this->validate($request, [
            'diachigiaohang' => ['required', 'string', 'max:255'],
            'dienthoaigiaohang' => ['required', 'string', 'max:20'],
            'xemay_id' => ['required', 'integer'],
        ]);

        // Lấy sản phẩm
        $xemay = XeMay::findOrFail($request->xemay_id);

        $dh = new DonHang;
        $dh->user_id = Auth::id();
        $dh->tinhtrang_id = 1;
        $dh->xemay_id = $xemay->id;
        $dh->diachigiaohang = $request->diachigiaohang;
        $dh->dienthoaigiaohang = $request->dienthoaigiaohang;
        $dh->dongia = $xemay->dongia;
        $dh->save();

        session(['last_order_id' => $dh->id]);

        // Gởi email
        Mail::to(Auth::user()->email)->send(new DatHangThanhCongEmail($dh));

        return redirect()->route('user.dathangthanhcong');
    }

    public function getDatHangThanhCong()
    {
        $orderId = session('last_order_id');

        if (! $orderId) {
            return redirect()->route('user.home');
        }

        $donhang = DonHang::with(['xeMay'])
            ->where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('user.dathangthanhcong', compact('donhang'));
    }

    public function getDonHang($id = null)
    {
        if ($id === null) {
            $userId = Auth::id();

            // Lấy các đơn hàng có kèm xe máy và tình trạng
            $donhang = DonHang::with(['XeMay', 'TinhTrang'])
                ->where('user_id', $userId)
                ->orderBy('id', 'desc')
                ->get();

            return view('user.donhang', compact('donhang'));
        }

        // Nếu có id → trang chi tiết đơn hàng
        $donhang = DonHang::with(['XeMay', 'TinhTrang'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.donhang_chitiet', compact('donhang'));
    }

    public function postDonHang(Request $request, $id)
    {
        // Bổ sung code tại đây
    }

    public function getHoSo()
    {
        return redirect()->route('user.home');
    }

    public function postHoSo(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        $orm = User::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->save();

        return redirect()->route('user.home')->with('success', 'Đã cập nhật thông tin thành công.');
    }

    public function postDoiMatKhau(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'max:255'],
            'new_password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::findOrFail(Auth::user()->id ?? 0);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('user.home')->with('success', 'Đổi mật khẩu thành công.');
        } else {
            return redirect()->route('user.home')->with('warning', 'Mật khẩu cũ không chính xác.');
        }
    }

    public function postDangXuat(Request $request)
    {
        // Đăng xuất user
        Auth::logout();

        // Xóa toàn bộ session
        $request->session()->invalidate();

        // Tạo CSRF token mới
        $request->session()->regenerateToken();

        // Điều hướng về trang chủ
        return redirect()->route('frontend.home')
            ->with('success', 'Bạn đã đăng xuất thành công.');
    }
}
