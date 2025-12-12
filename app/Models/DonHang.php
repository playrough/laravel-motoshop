<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonHang extends Model
{
    protected $table = 'donhang';

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function TinhTrang(): BelongsTo
    {
        return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
    }

    public function XeMay(): BelongsTo
    {
        return $this->belongsTo(XeMay::class, 'xemay_id', 'id');
    }
}
