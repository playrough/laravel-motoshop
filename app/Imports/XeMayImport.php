<?php

namespace App\Imports;

use App\Models\XeMay;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class XeMayImport implements ToModel, WithHeadingRow
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new XeMay([
            'loaixe_id' => $row['loaixe_id'],
            'hangxe_id' => $row['hangxe_id'],
            'tenxe' => $row['tenxe'],
            'tenxe_slug' => $row['tenxe_slug'],
            'soluong' => $row['soluong'],
            'dongia' => $row['dongia'],
            'hinhanh' => $row['hinhanh'] ?? null,
            'mota' => $row['mota'] ?? null,
            'dongco' => $row['dongco'] ?? null,
            'dungtich' => $row['dungtich'] ?? null,
            'namsanxuat' => $row['namsanxuat'] ?? null,
            'mausac' => $row['mausac'] ?? null,
        ]);
    }
}
