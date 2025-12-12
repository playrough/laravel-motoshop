<?php

namespace App\Exports;

use App\Models\HangXe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class HangXeExport implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping
{
    public function headings(): array
    {
        return [
            'id',
            'tenhang',
            'tenhang_slug',
            'hinhanh',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->tenhang,
            $row->tenhang_slug,
            $row->hinhanh,
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return HangXe::all();
    }
}
