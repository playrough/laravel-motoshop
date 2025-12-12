<?php

namespace App\Http\Controllers;

use App\Models\LoaiXe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiXeController extends Controller
{
    public function getDanhSach()
    {
        $loaixe = LoaiXe::all();

        return view('admin.loaixe.danhsach', compact('loaixe'));
    }

    public function getThem()
    {
        return view('admin.loaixe.them');
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaixe'],
        ]);

        $orm = new LoaiXe;
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        return redirect()->route('admin.loaixe');
    }

    public function getSua($id)
    {
        $loaixe = LoaiXe::find($id);

        return view('admin.loaixe.sua', compact('loaixe'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenloai' => ['required', 'string', 'max:255', 'unique:loaixe,tenloai,'.$id],
        ]);

        $orm = LoaiXe::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        return redirect()->route('admin.loaixe');
    }

    public function getXoa($id)
    {
        $orm = LoaiXe::find($id);
        $orm->delete();

        return redirect()->route('admin.loaixe');
    }
}
