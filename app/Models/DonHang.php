<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DonHang extends Model
{
    protected $table = 'donhang';
    /**
     * @return BelongsTo<User,DonHang>
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * @return BelongsTo<TinhTrang,DonHang>
     */
    public function TinhTrang(): BelongsTo
    {
        return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
    }
    /**
     * @return HasMany<DonHang_ChiTiet,DonHang>
     */
    public function DonHang_ChiTiet(): HasMany
    {
        return $this->hasMany(DonHangChiTiet::class, 'donhang_id', 'id');
    }
}
