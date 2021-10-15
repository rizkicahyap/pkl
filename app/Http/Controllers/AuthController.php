<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);
            $credentials  = $request->only('username', 'password');

            if (Auth::attempt($credentials )) {
                # code...
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->intended('admin');
                }
                elseif ($user->level == 'superadmin') {
                    return redirect()->intended('superadmin');
                }
                elseif ($user->level == 'direksi') {
                    return redirect()->intended('direksi');
                }
                elseif ($user->level == 'user' && $user->validasi == 'VALID') {
                    return redirect()->intended('user');
                }
                return redirect()->intended('/login')->with('status1', 'Login Gagal');
            }
            return redirect('/login')->with('status1', 'Login Gagal, Cek kembali username dan password');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login')->with('status2', 'Logout Berhasil');;
    }
}
