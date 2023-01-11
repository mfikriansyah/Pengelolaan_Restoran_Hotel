<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hidangan;

class OrderanController extends Controller
{
    public function index(Request $request)
    {
        $data['hidangans'] = Hidangan::all();
        if($request->ajax()){
            $allData = DataTables::of($data['hidangans'])
            ->addIndexColumn()
            ->addColumn('aksi', function($id){
                $btn = '<button type="button" id="btnEditHidangan" data-id="'.$id->id.' "data-toggle="modal" 
                data-target="#modalEditHidangan" class="btn btn-warning">Edit</button>';
                $btn .= '<a href="hidangan/delete/'.$id->id.'"
                id="'.$id->nama_hidangan.'" data-id="'.$id->id.' 
                "data-toggle="tooltip" class="btn-hapus btn btn-danger">Delete</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
            return $allData;
        }
        return view('orderan.index')->with($data);
    }
}
