<?php

namespace App\Http\Controllers;

use App\Models\MDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CDaftar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataCek()
    {
        $data = [
            'title' => 'Check-in Konser',
            'data' => MDaftar::with('user')->where('ket', '=', 'berhasil')->get(),
        ];
        return view('home.daftar.dataCek', $data);
    }

    public function checkIn($id)
    {
        $update['ket'] = 'berhasil';
        MDaftar::where('id_daftar', $id)->update($update);
        return redirect('/dashboard')->with('pesan', 'Berhasil check-in');
    }
    public function print($id)
    {
        $data = [
            'title' => 'cetak tiket',
            'data' => MDaftar::find($id),
        ];
        return view('home.daftar.print', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Daftar tiket',
        ];
        return view('home.daftar.daftar', $data);
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
            'telp' => 'min:10|max:15',
            'ket' => 'required',
        ]);
        $validasi['ID'] = Str::random(5);
        $validasi['id_user'] = auth()->user()->id;
        // $validasi['ket'] = 'belum';
        MDaftar::create($validasi);
        return redirect('/dashboard')->with('pesan', 'Anda berhasil daftar tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MDaftar  $mDaftar
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MDaftar  $mDaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(MDaftar $Daftar)
    {
        MDaftar::destroy($Daftar->id_daftar);
        return redirect('/dataCek')->with('pesan', 'Data pengguna berhasil di hapus');
    }
}
