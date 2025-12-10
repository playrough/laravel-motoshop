<?php

namespace App\Http\Controllers;

use App\Models\LoaiXe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiXeController extends Controller
{
    public function getDanhSach(): View
    {
        $loaixe = LoaiXe::all();
        return view('admin.loaixe.danhsach', compact('loaixe'));
    }
    public function getThem(): View
    {
        return view('admin.loaixe.them');
    }
    public function postThem(Request $request): RedirectResponse
    {
        $orm = new LoaiXe();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('admin.loaixe');
    }
    /**
     * @param mixed $id
     */
    public function getSua($id): View
    {
        $loaixe = LoaiXe::find($id);
        return view('admin.loaixe.sua', compact('loaixe'));
    }
    /**
     * @param mixed $id
     */
    public function postSua(Request $request, $id): RedirectResponse
    {
        $orm = LoaiXe::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('admin.loaixe');
    }
    /**
     * @param mixed $id
     */
    public function getXoa($id): RedirectResponse
    {
        $orm = LoaiXe::find($id);
        $orm->delete();
        return redirect()->route('admin.loaixe');
    }
}
