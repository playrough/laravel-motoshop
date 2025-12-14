<?php

namespace App\Exports;

use App\Models\XeMay;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class XeMayExport implements FromCollection, WithCustomStartCell, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'id',
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
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->loaixe_id,
            $row->hangxe_id,
            $row->tenxe,
            $row->tenxe_slug,
            $row->soluong,
            $row->dongia,
            $row->hinhanh,
            $row->mota,
            $row->dongco,
            $row->dungtich,
            $row->namsanxuat,
            $row->mausac,
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function collection()
    {
        return XeMay::all();
    }
}
