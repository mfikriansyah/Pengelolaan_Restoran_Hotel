<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapOrder;
use PDF;
use Excel;
use App\Exports\RekapExport;

class RekapOrderController extends Controller
{
    public function index()
    {
        $data['rekaps'] = RekapOrder::all();
        return view('rekapOrder.index')->with($data);
    }
    public function print()
    {
        $rekaps = RekapOrder::all();
        $pdf = PDF::loadview('rekapOrder.print', ['rekaps' => $rekaps]);
        return $pdf->download('rekap_orderan.pdf');
    }
    public function export()
    {
        return Excel::download(new RekapExport, 'rekap.xlsx');
    }
    
}
