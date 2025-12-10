<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonHangChiTiet extends Model
{
    protected $table = 'donhang_chitiet';
    /**
     * @return BelongsTo<DonHang,DonHangChiTiet>
     */
    public function DonHang(): BelongsTo
    {
        return $this->belongsTo(DonHang::class, 'donhang_id', 'id');
    }
    /**
     * @return BelongsTo<XeMay,DonHangChiTiet>
     */
    public function XeMay(): BelongsTo
    {
        return $this->belongsTo(XeMay::class, 'xemay_id', 'id');
    }
}
