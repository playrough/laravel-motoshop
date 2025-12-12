<?php

namespace App\Http\Controllers;

use App\Models\HangXe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Imports\HangXeImport;
use App\Exports\HangXeExport;
use Maatwebsite\Excel\Facades\Excel;

class HangXeController extends Controller
{
    public function getDanhSach()
	{
		$hangxe = HangXe::all();
		return view('admin.hangxe.danhsach', compact('hangxe'));
	}
	
	public function getThem()
	{
		return view('admin.hangxe.them');
	}
	
	public function postThem(Request $request)
	{
		$request->validate([
			'tenhang' => ['required', 'string', 'max:255', 'unique:hangxe'],
			'hinhanh' => ['nullable', 'image', 'max:1024'],
		]);
		
		// Xử lý upload (nếu có)
		$path = null;
		if($request->hasFile('hinhanh'))
		{
			// Xác định tên tập tin
			$file = $request->file('hinhanh');
			$extension = $file->extension();
			$filename = Str::slug($request->tenhang, '-') . '.' . $extension;
			
			// Upload vào thư mục 'hang-xe' và trả về đường dẫn
			$path = $file->storeAs('hang-xe', $filename, 'public');
		}
		
		$orm = new HangXe();
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->hinhanh = $path ?? null;
		$orm->save();
		
		return redirect()->route('admin.hangxe');
	}
	
	public function getSua($id)
	{
		$hangxe = HangXe::find($id);
		return view('admin.hangxe.sua', compact('hangxe'));
	}
	
	public function postSua(Request $request, $id)
	{
		$request->validate([
			'tenhang' => ['required', 'string', 'max:255', 'unique:hangxe,tenhang,' . $id],
			'hinhanh' => ['nullable', 'image', 'max:1024'],
		]);
		
		$orm = HangXe::find($id);
		
		// Kiểm tra tập tin rỗng hay không?
		$path = null;
		if($request->hasFile('hinhanh'))
		{
			// Xóa tập tin cũ
			if($orm->hinhanh) Storage::delete($orm->hinhanh);
			
			// Xác định tên tập tin
			$file = $request->file('hinhanh');
			$extension = $file->extension();
			$filename = Str::slug($request->tenhang, '-') . '.' . $extension;
			
			// Upload vào thư mục 'hang-xe' và trả về đường dẫn
			$path = $file->storeAs('hang-xe', $filename, 'public');
		}
		
		$orm->tenhang = $request->tenhang;
		$orm->tenhang_slug = Str::slug($request->tenhang, '-');
		$orm->hinhanh = $path ?? $orm->hinhanh ?? null;
		$orm->save();
		
		return redirect()->route('admin.hangxe');
	}
	
	public function getXoa($id)
	{
		$orm = HangXe::find($id);
		
		// Lấy đường dẫn ảnh trước khi xóa đối tượng
		$hinhanh = $orm->hinhanh;
		
		$orm->delete();
		
		// Xóa tập tin khi xóa dữ liệu
		if($hinhanh) Storage::delete($hinhanh);
		
		return redirect()->route('admin.hangxe');
	}
	
	public function postNhap(Request $request)
	{
		$request->validate([
			'file_excel' => ['required', 'file', 'mimes:xlsx,xls', 'max:2048'],
		]);
		
		$import = new HangXeImport();
		Excel::import($import, $request->file('file_excel'));
		
		return redirect()->route('admin.hangxe');
	}
	
	public function getXuat()
	{
		$filename = 'hang-xe.xlsx';
		return Excel::download(new HangXeExport(), $filename);
	}
}
