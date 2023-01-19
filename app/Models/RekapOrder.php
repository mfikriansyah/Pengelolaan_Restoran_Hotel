<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getDataRekap($tanggal)
    {
        if($tanggal != null) {
            $rekaps = RekapOrder::whereDate('created_at', $tanggal)->get();
        }else{
            $rekaps = RekapOrder::all();
        }
        $rekaps_filter = [];

        foreach($rekaps as $no => $rekap){
            $harga = 'Rp. '.$rekap->total_harga;
            $rekaps_filter[$no]['No'] = $no+1;
            $rekaps_filter[$no]['No Kamar'] = $rekap->no_kamar;
            $rekaps_filter[$no]['Nama Hidangan'] = $rekap->nama_hidangan;
            $rekaps_filter[$no]['Total Harga'] = $harga;
            $rekaps_filter[$no]['Email'] = $rekap->email;
            $rekaps_filter[$no]['Status'] = $rekap->status_order;
            $rekaps_filter[$no]['Tanggal'] = $rekap->created_at;

        }
        return $rekaps_filter;
    }
}
