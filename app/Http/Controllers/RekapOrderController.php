<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapOrder;
use PDF;
use Excel;
use App\Exports\RekapExport;

class RekapOrderController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('tanggal')) {
            $data['tanggal'] = $request->get('tanggal');
            $data['rekaps'] = RekapOrder::whereDate('created_at', $request->get('tanggal'))->get();
            return view('rekapOrder.index')->with($data);
        }else{
            $data['rekaps'] = RekapOrder::all();
            return view('rekapOrder.index')->with($data);
        }
    }
    public function print($tanggal = null)
    {
        if($tanggal != null) {
            $rekaps = RekapOrder::whereDate('created_at', $tanggal)->get();
        }else{
            $rekaps = RekapOrder::all();
        }
        $pdf = PDF::loadview('rekapOrder.print', ['rekaps' => $rekaps]);
        return $pdf->download('rekap_orderan_'.$tanggal.'.pdf');
    }
    public function export($tanggal = null)
    {
        return Excel::download(new RekapExport($tanggal), 'rekap_orderan_'.$tanggal.'.xlsx');
    }
    
}
