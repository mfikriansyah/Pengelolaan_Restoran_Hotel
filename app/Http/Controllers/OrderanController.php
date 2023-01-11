<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orderan;
use Illuminate\Support\Arr;
use Validator;
use App\Models\RekapOrder;

class OrderanController extends Controller
{
    public function index(Request $request)
    {
        $data['orderans'] = Orderan::all();
        // if($request->ajax()){
        //     $allData = DataTables::of($data['orderans'])
        //     ->addIndexColumn()
        //     // ->addColumn('aksi', function($id){
        //     //     $btn = '<button type="button" id="btnEditHidangan" "data-toggle="tooltip" data-id="'.$id->id.' class="btn btn-warning">Edit</button>';
        //     //     $btn .= '<a href="hidangan/delete/'.$id->id.'"
        //     //     id="'.$id->nama_hidangan.'" data-id="'.$id->id.' 
        //     //     "data-toggle="tooltip" class="btn-hapus btn btn-danger">Delete</button>';
        //     //     return $btn;
        //     // })
        //     // ->rawColumns(['aksi'])
        //     ->make(true);
        //     return $allData;
        // }
        return view('orderan.index')->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_hidangan' => 'string',
            'harga_hidangan' => 'numeric',
        ]);
        if ($validator->passes()) {
            $input  = $request->all();
            //dd(Arr::except($input,['id']));
            RekapOrder::create(Arr::except($input,['id']));
            Orderan::where('id', $request->id)->delete();
            $notification = array(
                'message' => 'Berhasil Memproses',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    
    }
}
