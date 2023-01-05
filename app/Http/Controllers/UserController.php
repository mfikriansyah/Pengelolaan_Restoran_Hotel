<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hidangan;

class UserController extends Controller
{
    public function index()
    {
        $data['hidangans'] = Hidangan::all();
        return view('user.index')->with($data);
    }
}
