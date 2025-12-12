<?php

namespace App\Http\Controllers;

use App\Exports\XeMayExport;
use App\Imports\XeMayImport;
use App\Models\HangXe;
use App\Models\LoaiXe;
use App\Models\XeMay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class XeMayController extends Controller
{
    public function getDanhSach()
    {
        $xemay = XeMay::orderBy('hangxe_id')->paginate(20);

        return view('admin.xemay.danhsach', compact('xemay'));
    }

    public function getThem()
    {
        $loaixe = LoaiXe::all();
        $hangxe = HangXe::all();

        return view('admin.xemay.them', compact('loaixe', 'hangxe'));
    }

    public function postThem(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'loaixe_id' => ['required'],
            'hangxe_id' => ['required'],
            'tenxe' => ['required', 'string', 'max:255', 'unique:xemay'],
            'soluong' => ['required', 'numeric'],
            'dongia' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
            'dongco' => ['nullable', 'string', 'max:255'],
            'dungtich' => ['nullable', 'string', 'max:255'],
            'namsanxuat' => ['nullable', 'string', 'max:255'],
            'mausac' => ['nullable', 'string', 'max:255'],
        ]);

        // Xử lý upload (nếu có)
        $path = null;
        if ($request->hasFile('hinhanh')) {
            // Xác định thư mục
            $loaixe = LoaiXe::find($request->loaixe_id);
            $directory = $loaixe->tenloai_slug;

            // Xác định tên tập tin
            $file = $request->file('hinhanh');
            $extension = $file->extension();
            $filename = Str::slug($request->tenxe, '-').'.'.$extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = $file->storeAs($directory, $filename, 'public');
        }

        $orm = new XeMay;
        $orm->loaixe_id = $request->loaixe_id;
        $orm->hangxe_id = $request->hangxe_id;
        $orm->tenxe = $request->tenxe;
        $orm->tenxe_slug = Str::slug($request->tenxe, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hinhanh = $path ?? null;
        $orm->mota = $request->mota;
        $orm->dongco = $request->dongco;
        $orm->dungtich = $request->dungtich;
        $orm->namsanxuat = $request->namsanxuat;
        $orm->mausac = $request->mausac;
        $orm->save();

        return redirect()->route('admin.xemay');
    }

    public function getSua($id)
    {
        $xemay = XeMay::find($id);
        $loaixe = LoaiXe::all();
        $hangxe = HangXe::all();

        return view('admin.xemay.sua', compact('xemay', 'loaixe', 'hangxe'));
    }

    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'loaixe_id' => ['required'],
            'hangxe_id' => ['required'],
            'tenxe' => ['required', 'string', 'max:255', 'unique:xemay,tenxe,'.$id],
            'soluong' => ['required', 'numeric'],
            'dongia' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
            'dongco' => ['nullable', 'string', 'max:255'],
            'dungtich' => ['nullable', 'string', 'max:255'],
            'namsanxuat' => ['nullable', 'string', 'max:255'],
            'mausac' => ['nullable', 'string', 'max:255'],
        ]);

        $orm = XeMay::find($id);

        $path = null;
        if ($request->hasFile('hinhanh')) {
            // Xóa tập tin cũ
            if ($orm->hinhanh) {
                Storage::delete($orm->hinhanh);
            }

            // Xác định thư mục
            $loaixe = LoaiXe::find($request->loaixe_id);
            $directory = $loaixe->tenloai_slug;

            // Xác định tên tập tin
            $file = $request->file('hinhanh');
            $extension = $file->extension();
            $filename = Str::slug($request->tenxe, '-').'.'.$extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = $file->storeAs($directory, $filename, 'public');
        }

        $orm->loaixe_id = $request->loaixe_id;
        $orm->hangxe_id = $request->hangxe_id;
        $orm->tenxe = $request->tenxe;
        $orm->tenxe_slug = Str::slug($request->tenxe, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hinhanh = $path ?? $orm->hinhanh ?? null;
        $orm->mota = $request->mota;
        $orm->dongco = $request->dongco;
        $orm->dungtich = $request->dungtich;
        $orm->namsanxuat = $request->namsanxuat;
        $orm->mausac = $request->mausac;
        $orm->save();

        return redirect()->route('admin.xemay');
    }

    public function getXoa($id)
    {
        $orm = XeMay::find($id);

        // Lấy đường dẫn ảnh trước khi xóa đối tượng
        $hinhanh = $orm->hinhanh;

        $orm->delete();

        // Xóa tập tin khi xóa dữ liệu
        if ($hinhanh) {
            Storage::delete($hinhanh);
        }

        return redirect()->route('admin.xemay');
    }

    public function postNhap(Request $request)
    {
        $request->validate([
            'file_excel' => ['required', 'file', 'mimes:xlsx,xls', 'max:2048'],
        ]);

        $import = new XeMayImport;
        Excel::import($import, $request->file('file_excel'));

        return redirect()->route('admin.xemay');
    }

    public function getXuat()
    {
        $filename = 'xe-may.xlsx';

        return Excel::download(new XeMayExport, $filename);
    }
}
