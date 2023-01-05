<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Hidangan;
use Storage;
use DB;
use DataTables;
use Illuminate\Support\Arr;

class HidanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return view('hidangan.index')->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_hidangan' => 'required|unique:hidangans,nama_hidangan',
            'deskripsi_hidangan' => 'required',
            'gambar_hidangan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_hidangan' => 'required|numeric',
            'stok_hidangan' => 'required|numeric|max:string:3'
        ]);
        if ($validator->passes()) {
            $kosong = null;
            $input  = $request->all();
            if(!empty($input['gambar_hidangan'])){
                $input['gambar_hidangan'] = time().'.'.$request->file('gambar_hidangan')->extension();
                $request->file('gambar_hidangan')->storeAs('public/gambar_hidangan', $input['gambar_hidangan']);
                Hidangan::create($input);
            }else{
                $input['gambar_hidangan'] = $kosong;
                Hidangan::create($input);
            }
            return response()->json(['success'=>'Berhasil Menambah.']);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
    public function edit($id)
    {
        $data = Hidangan::find($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar_hidangan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_hidangan' => 'numeric',
            'stok_hidangan' => 'numeric|max:string:3'
        ]);
        $kosong = null;
        $input  = $request->all();
        $filter = Arr::except($input,['old_gambar_hidangan', '_method', '_token']);
        if ($validator->passes()) {
            if(!empty($input['gambar_hidangan'])){
                $filter['gambar_hidangan'] = time().'.'.$request->file('gambar_hidangan')->extension();
                $request->file('gambar_hidangan')->storeAs('public/gambar_hidangan', $filter['gambar_hidangan']);
                Storage::delete('public/gambar_hidangan/'.$input['old_gambar_hidangan']);
                DB::table('hidangans')->where('id', $input['id'])->update($filter);
            }else{
                $input['gambar_hidangan'] = $kosong;
                DB::table('hidangans')->where('id', $input['id'])->update($filter);
            }
            return response()->json(['success'=>'Berhasil Memperbarui.']);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
    public function delete($id)
    {
        $hidangan = Hidangan::findOrFail($id);
        Storage::delete('public/gambar_hidangan/'.$hidangan->gambar_hidangan);
        $hidangan->delete();
        return response()->json(['success'=>'Berhasil Menghapus.']);
    }
}
