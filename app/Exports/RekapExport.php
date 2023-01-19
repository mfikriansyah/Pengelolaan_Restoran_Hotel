<?php

namespace App\Exports;

use App\Models\RekapOrder;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapExport implements FromArray,WithHeadings, ShouldAutoSize
{
    private $tanggal;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return RekapOrder::getDataRekap($this->tanggal);
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
