<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HangXe extends Model
{
    protected $table = 'hangxe';

	protected $fillable = [
		'tenhang',
		'tenhang_slug',
		'hinhanh'
	];

    public function XeMay(): HasMany
    {
        return $this->hasMany(XeMay::class, 'hangxe_id', 'id');
    }
}
