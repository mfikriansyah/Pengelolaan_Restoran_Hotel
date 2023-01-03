<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Hidangan;

class HidanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['hidangans'] = Hidangan::orderBy('nama_hidangan', 'ASC')->get();
        return view('hidangan.index')->with($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_hidangan' => 'required|unique:hidangans,nama_hidangan',
            'deskripsi_hidangan' => 'required',
            'gambar_hidangan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga_hidangan' => 'required|numeric'
        ]);
        if ($validator->passes()) {
            $input  = $request->all();
            $input['gambar_hidangan'] = time().'.'.$request->file('gambar_hidangan')->extension();
            $request->file('gambar_hidangan')->storeAs('public/gambar_hidangan', $input['gambar_hidangan']);
            Hidangan::create($input);
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
}
