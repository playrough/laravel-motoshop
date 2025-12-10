<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HangXe extends Model
{
    protected $table = 'hangxe';
    /**
     * @return HasMany<XeMay,HangXe>
     */
    public function XeMay(): HasMany
    {
        return $this->hasMany(XeMay::class, 'hangxe_id', 'id');
    }
}
