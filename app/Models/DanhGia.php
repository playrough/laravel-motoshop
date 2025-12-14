<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danhgia';

    protected $fillable = [
        'xemay_id',
        'user_id',
        'tieude',
        'tieude_slug',
        'sosao',
        'noidung',
        'luotxem',
        'kiemduyet',
        'kichhoat',
    ];

    public function xemay()
    {
        return $this->belongsTo(XeMay::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
