<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use App\Models\User;
use App\Models\XeMay;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DanhGiaController extends Controller
{
    // Danh sách đánh giá
    public function getDanhSach()
    {
        $danhgia = DanhGia::with(['user', 'xemay'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.danhgia.danhsach', compact('danhgia'));
    }

    // Form thêm mới
    public function getThem()
    {
        $xemay = XeMay::all();
        $users = User::all();

        return view('admin.danhgia.them', compact('xemay', 'users'));
    }

    // Lưu đánh giá mới
    public function postThem(Request $request)
    {
        $request->validate([
            'xemay_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'], // đổi từ nguoidung_id
            'tieude' => ['required', 'string', 'max:300'],
            'sosao' => ['required', 'integer', 'between:1,5'],
            'noidung' => ['required', 'string', 'min:5'],
            'kiemduyet' => ['nullable', 'boolean'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $orm = new DanhGia;
        $orm->xemay_id = $request->xemay_id;
        $orm->user_id = $request->user_id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->sosao = $request->sosao;
        $orm->noidung = $request->noidung;
        $orm->luotxem = 0;
        $orm->kiemduyet = $request->has('kiemduyet') ? 1 : 0;
        $orm->kichhoat = $request->has('kichhoat') ? 1 : 0;
        $orm->save();

        return redirect()->route('admin.danhgia');
    }

    // Form sửa
    public function getSua($id)
    {
        $danhgia = DanhGia::findOrFail($id);
        $xemay = XeMay::all();
        $users = User::all();

        return view('admin.danhgia.sua', compact('danhgia', 'xemay', 'users'));
    }

    // Cập nhật đánh giá
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'xemay_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'tieude' => ['required', 'string', 'max:300'],
            'sosao' => ['required', 'integer', 'between:1,5'],
            'noidung' => ['required', 'string', 'min:5'],
            'kiemduyet' => ['nullable', 'boolean'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $orm = DanhGia::findOrFail($id);
        $orm->xemay_id = $request->xemay_id;
        $orm->user_id = $request->user_id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->sosao = $request->sosao;
        $orm->noidung = $request->noidung;
        $orm->kiemduyet = $request->has('kiemduyet') ? 1 : 0;
        $orm->kichhoat = $request->has('kichhoat') ? 1 : 0;
        $orm->save();

        return redirect()->route('admin.danhgia');
    }

    // Xóa đánh giá
    public function getXoa($id)
    {
        $orm = DanhGia::findOrFail($id);
        $orm->delete();

        return redirect()->route('admin.danhgia');
    }
}
