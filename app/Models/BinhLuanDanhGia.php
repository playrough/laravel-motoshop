<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinhLuanDanhGia extends Model
{
    protected $table = 'binhluan_danhgia';

    protected $fillable = [
        'danhgia_id',
        'user_id',
        'noidung',
        'kiemduyet',
        'kichhoat',
    ];

    public function danhgia()
    {
        return $this->belongsTo(DanhGia::class, 'danhgia_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
