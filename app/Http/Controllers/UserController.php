<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hidangan;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $data['hidangans'] = Hidangan::all();
        return view('user.hidangan')->with($data);
    }
    public function cart()
    {
        return view('user.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $hidangan = Hidangan::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['jumlah']++;
        } else {
            $cart[$id] = [
                "nama" => $hidangan->nama_hidangan,
                "jumlah" => 1,
                "harga" => $hidangan->harga_hidangan,
                "gambar" => $hidangan->gambar_hidangan
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with(['success'=>'Berhasil Ditambahkan Kedalam Keranjang.']);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->jumlah){
            $cart = session()->get('cart');
            $cart[$request->id]["jumlah"] = $request->jumlah;
            session()->put('cart', $cart);
            // session()->flash('success', 'Product removed successfully');
        }
        return response()->json(['success'=>'Berhasil Mengubah Jumlah Pesanan.']);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Product removed successfully');
        }
        return response()->json(['success'=>'Berhasil Menghapus Pesanan.']);
    }
}
