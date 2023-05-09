<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class CPengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'title' => 'Data pengguna',
            'pengguna' => UserModel::all(),
        ];
        return view('home.admin.admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah data',
        ];
        return view('home.admin.adminTambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'username' => 'alpha_dash:ascii|lowercase|unique:users,username',
            'telp' => 'min:10|max:15',
            'status' => 'required',
        ]);
        $validasi['password'] = bcrypt($request->password);
        $validasi['password2'] = $request->password;
        UserModel::create($validasi);
        return redirect('/pengguna')->with('pesan', 'Data pengguna berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit data admin',
            'pengguna' => UserModel::find($id),
        ];
        return view('home.admin.adminEdit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'telp' => 'min:10|max:15',
            'status' => 'required',
        ]);
        $validasi['password'] = bcrypt($request->password);
        $validasi['password2'] = $request->password;
        if ($request->username === auth()->user()->username) {
            $validasi['username'] = $request->username;
        } else {
            $validasi = $request->validate(['username' => 'alpha_dash:ascii|lowercase|unique:users,username']);
        }
        if ($id == auth()->user()->id)
            $validasi['status'] = auth()->user()->status;
        UserModel::where('id', $id)->update($validasi);
        return redirect('/pengguna')->with('pesan', 'Data pengguna berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == auth()->user()->id)
            return redirect()->back()->with('gagal', 'Tidak bisa menghapus data akun yang sedang digunakan');
        // $user = MPengguna::find($id);
        UserModel::destroy($id);
        return redirect('/pengguna')->with('pesan', 'Data pengguna berhasil di hapus');
    }
}
