<?php

namespace App\Exports;

use App\Models\RekapOrder;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapExport implements FromArray,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return RekapOrder::getDataRekap();
    }
    // public function collection()
    // {
    //     return RekapOrder::all();
    // }
    public function headings(): array
    {
        return [
            'No',
            'No Kamar',
            'Nama Hidangan',
            'Total Harga',
            'Email',
            'Status',
            'Tanggal'
        ];
    }
}
