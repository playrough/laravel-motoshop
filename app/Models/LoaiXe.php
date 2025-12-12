<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoaiXe extends Model
{
    protected $table = 'loaixe';

    public function XeMay(): HasMany
    {
        return $this->hasMany(XeMay::class, 'loaixe_id', 'id');
    }
}
