<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\MDaftar;

class CGlobal extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Konser',
        ];
        return view('global.index', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('global.login', $data);
    }

    public function authenticate(Request $req)
    {
        $credentials = $req->validate([
            // 'email' => 'email:dns',
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd($req);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            // return  auth()->user()->nama;
            return redirect()->intended('/dashboard');
        }

        return back()->with('gagal', 'Username atau password anda salah');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard Konser',
            'data' => MDaftar::with('user')->where('ket', '=', 'belum')->get(),
        ];
        if (auth()->user()->status == 'penonton')
            $data['data'] = MDaftar::with('user')->where('id_user', '=', auth()->user()->id)->get();
        // return $data['data'];
        return view('home.dashboard', $data);
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Daftar pengguna',
        ];
        return view('global.registrasi', $data);
    }

    public function saveRegistrasi(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'username' => 'alpha_dash:ascii|lowercase|unique:users,username',
            'telp' => 'min:10|max:15',
            'password' => 'confirmed',
            'status' => 'required',
        ]);
        $validasi['password'] = bcrypt($request->password);
        $validasi['password2'] = $request->password;
        UserModel::create($validasi);
        return redirect('/')->with('pesan', 'Anda berhasil registrasi');
    }
}
