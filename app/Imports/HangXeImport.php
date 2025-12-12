<?php

namespace App\Imports;

use App\Models\HangXe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HangXeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new HangXe([
            'tenhang' => $row['tenhang'],
            'tenhang_slug' => $row['tenhang_slug'],
            'hinhanh' => $row['hinhanh'],
        ]);
    }
}
