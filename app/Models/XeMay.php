<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class XeMay extends Model
{
    protected $table = 'xemay';

    protected $fillable = [
        'loaixe_id',
        'hangxe_id',
        'tenxe',
        'tenxe_slug',
        'soluong',
        'dongia',
        'hinhanh',
        'mota',
        'dongco',
        'dungtich',
        'namsanxuat',
        'mausac',
    ];

    public function LoaiXe(): BelongsTo
    {
        return $this->belongsTo(LoaiXe::class, 'loaixe_id', 'id');
    }

    public function HangXe(): BelongsTo
    {
        return $this->belongsTo(HangXe::class, 'hangxe_id', 'id');
    }

    public function danhGia()
    {
        return $this->hasMany(DanhGia::class, 'xemay_id');
    }
}
