<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapOrder;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['hari'] = RekapOrder::whereDate('created_at', date("Y-m-d"))->count();
        $data['hariPendapatan'] = RekapOrder::whereDate('created_at', date("Y-m-d"))->sum('total_harga');
        $data['bulan'] = RekapOrder::whereMonth('created_at', date('m'))->count();
        $data['bulanPendapatan'] = RekapOrder::whereMonth('created_at', date('m'))->sum('total_harga');;
        
        return view('dashboard.index')->with($data);
    }
}
