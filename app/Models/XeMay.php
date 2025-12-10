<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class XeMay extends Model
{
    protected $table = 'xemay';
    /**
     * @return BelongsTo<LoaiXe,XeMay>
     */
    public function LoaiXe(): BelongsTo
    {
        return $this->belongsTo(LoaiXe::class, 'loaixe_id', 'id');
    }
    /**
     * @return BelongsTo<HangXe,XeMay>
     */
    public function HangXe(): BelongsTo
    {
        return $this->belongsTo(HangXe::class, 'hangxe_id', 'id');
    }
    /**
     * @return HasMany<DonHang_ChiTiet,XeMay>
     */
    public function DonHang_ChiTiet(): HasMany
    {
        return $this->hasMany(DonHangChiTiet::class, 'xemay_id', 'id');
    }
}
