<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\TinhTrang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDanhSach()
    {
        $donhang = DonHang::orderBy('created_at', 'desc')->get();

        return view('admin.donhang.danhsach', compact('donhang'));
    }

    public function getThem() {}

    public function postThem(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'dienthoaigiaohang' => ['required', 'string', 'max:20'],
            'diachigiaohang' => ['required', 'string', 'max:255'],
            'tinhtrang_id' => ['required'],
        ]);

        $orm = new DonHang;
        $orm->user_id = $request->user_id;
        $orm->dienthoaigiaohang = $request->dienthoaigiaohang;
        $orm->diachigiaohang = $request->diachigiaohang;
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->save();

        return redirect()->route('admin.donhang');
    }

    public function getSua($id)
    {
        $donhang = DonHang::find($id);
        $tinhtrang = TinhTrang::all();

        return view('admin.donhang.sua', compact('donhang', 'tinhtrang'));
    }

    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'tinhtrang_id' => ['required'],
            'dienthoaigiaohang' => ['required', 'string', 'max:20'],
            'diachigiaohang' => ['required', 'string', 'max:255'],
        ]);

        $orm = DonHang::find($id);
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->dienthoaigiaohang = $request->dienthoaigiaohang;
        $orm->diachigiaohang = $request->diachigiaohang;
        $orm->save();

        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.donhang');
    }

    public function getXoa($id)
    {
        $orm = DonHang::find($id);
        $orm->delete();

        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.donhang');
    }
}
