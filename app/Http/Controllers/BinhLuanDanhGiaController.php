<?php

namespace App\Http\Controllers;

use App\Models\BinhLuanDanhGia;
use App\Models\DanhGia;
use App\Models\User;
use Illuminate\Http\Request;

class BinhLuanDanhGiaController extends Controller
{
    // Danh sách bình luận
    public function getDanhSach()
    {
        $binhluan = BinhLuanDanhGia::with(['nguoidung', 'danhgia'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.binhluan.danhsach', compact('binhluan'));
    }

    // Form thêm
    public function getThem()
    {
        $danhgia = DanhGia::all();
        $nguoidung = User::all();

        return view('admin.binhluan.them', compact('danhgia', 'nguoidung'));
    }

    // Lưu bình luận mới
    public function postThem(Request $request)
    {
        $request->validate([
            'danhgia_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'noidung' => ['required', 'string', 'min:5'],
            'kiemduyet' => ['nullable', 'boolean'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $orm = new BinhLuanDanhGia;
        $orm->danhgia_id = $request->danhgia_id;
        $orm->user_id = $request->user_id;
        $orm->noidung = $request->noidung;
        $orm->kiemduyet = $request->kiemduyet ?? 0;
        $orm->kichhoat = $request->kichhoat ?? 1;
        $orm->save();

        return redirect()->route('admin.binhluan');
    }

    // Form sửa
    public function getSua($id)
    {
        $binhluan = BinhLuanDanhGia::findOrFail($id);
        $danhgia = DanhGia::all();
        $nguoidung = User::all();

        return view('admin.binhluan.sua', compact('binhluan', 'danhgia', 'nguoidung'));
    }

    // Cập nhật bình luận
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'danhgia_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'noidung' => ['required', 'string', 'min:5'],
            'kiemduyet' => ['nullable', 'boolean'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $orm = BinhLuanDanhGia::findOrFail($id);
        $orm->danhgia_id = $request->danhgia_id;
        $orm->user_id = $request->user_id;
        $orm->noidung = $request->noidung;
        $orm->kiemduyet = $request->kiemduyet ?? 0;
        $orm->kichhoat = $request->kichhoat ?? 1;
        $orm->save();

        return redirect()->route('admin.binhluan');
    }

    // Xóa bình luận
    public function getXoa($id)
    {
        $orm = BinhLuanDanhGia::findOrFail($id);
        $orm->delete();

        return redirect()->route('admin.binhluan');
    }
}
