<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    // Danh sách
    public function getDanhSach()
    {
        $carousels = Carousel::orderBy('thutu')->get();

        return view('admin.carousel.danhsach', compact('carousels'));
    }

    // Form thêm
    public function getThem()
    {
        return view('admin.carousel.them');
    }

    // Lưu mới
    public function postThem(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'tieude' => ['required', 'string', 'max:255'],
            'mota' => ['nullable', 'string'],
            'thutu' => ['required', 'integer'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $carousel = new Carousel;

        // Upload banner
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/carousel'), $filename);
            $carousel->banner = $filename;
        }

        $carousel->tieude = $request->tieude;
        $carousel->mota = $request->mota;
        $carousel->thutu = $request->thutu;
        $carousel->kichhoat = $request->has('kichhoat') ? 1 : 0;
        $carousel->save();

        return redirect()->route('admin.carousel');
    }

    // Form sửa
    public function getSua($id)
    {
        $carousel = Carousel::findOrFail($id);

        return view('admin.carousel.sua', compact('carousel'));
    }

    // Cập nhật
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'tieude' => ['required', 'string', 'max:255'],
            'mota' => ['nullable', 'string'],
            'thutu' => ['required', 'integer'],
            'kichhoat' => ['nullable', 'boolean'],
        ]);

        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('banner')) {
            // Xóa ảnh cũ nếu muốn
            if ($carousel->banner && file_exists(public_path('uploads/carousel/'.$carousel->banner))) {
                unlink(public_path('uploads/carousel/'.$carousel->banner));
            }
            $file = $request->file('banner');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/carousel'), $filename);
            $carousel->banner = $filename;
        }

        $carousel->tieude = $request->tieude;
        $carousel->mota = $request->mota;
        $carousel->thutu = $request->thutu;
        $carousel->kichhoat = $request->has('kichhoat') ? 1 : 0;
        $carousel->save();

        return redirect()->route('admin.carousel');
    }

    // Xóa
    public function getXoa($id)
    {
        $carousel = Carousel::findOrFail($id);

        // Xóa file banner
        if ($carousel->banner && file_exists(public_path('uploads/carousel/'.$carousel->banner))) {
            unlink(public_path('uploads/carousel/'.$carousel->banner));
        }

        $carousel->delete();

        return redirect()->route('admin.carousel');
    }
}
