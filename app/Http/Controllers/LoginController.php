<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:5'
        ]);
        
        // If the validation fails, redirect back to the login page
        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = DB::table('users')->where('username', $request->username)->first();
            if($user){
                // Attempt to log the user in
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                    // Authentication passed...
                    $request->session()->regenerate();
                    $notification = array(
                            'message' => 'Berhasil Login',
                            'alert-type' => 'success'
                        );
                    return redirect()->intended('dashboard')->with($notification) ;
                } else {
                    // Authentication failed...
                    $notification = array(
                        'message' => 'Password Salah',
                        'alert-type' => 'error'
                    );
                    return redirect('login')->with($notification);
                }
            }else{
                $notification = array(
                    'message' => 'Username Tidak Ada',
                    'alert-type' => 'error'
                );
                return redirect('login')->with($notification);
            }

        }
        
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
