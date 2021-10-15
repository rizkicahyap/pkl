<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('superadmin.pengguna', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = Pengguna::all();
        return view('superadmin.bp', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'level' => 'required'
        ]);

        Pengguna::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'level' => $request->level,
            'validasi' => 'INVALID',
            'req_akses' => 'NORMAL',
            'akses' => 'BELUM'
        ]);
  
    return redirect('/superadmin/datapengguna')->with('status', 'Pengguna Berhasil Didaftarkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('superadmin.ep', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        if ($pengguna->akses == 'SETUJU'){ 
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'nullable',
                'email' => 'required',
                // 'level' => 'required'
            ]);

            if ($request->filled('password')){ 
                Pengguna::where('id', $pengguna->id)
                        ->update([
                            'name' => $request->name,
                            'username' => $request->username,
                            'password' => bcrypt($request->password),
                            'email' => $request->email,
                            // 'level' => $request->level,
                            'req_akses' => 'NORMAL',
                            'akses' => 'BELUM'
                        ]);
            }
            
            else{
                Pengguna::where('id', $pengguna->id)
                        ->update([
                            'name' => $request->name,
                            'username' => $request->username,
                            'email' => $request->email,
                            // 'level' => $request->level,
                            'req_akses' => 'NORMAL',
                            'akses' => 'BELUM'
                        ]);
            }

            return redirect('/superadmin/datapengguna')->with('status', 'Data Pengguna Berhasil Diubah!');
        }
        else {
            return redirect('/superadmin/datapengguna')->with('status1', 'Anda Tidak Memiliki Akses!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        Pengguna::destroy($pengguna->id);
        return redirect('/superadmin/datapengguna')->with('status', 'Pengguna Berhasil Dihapus!');
    }

    public function req_akses_edit(Pengguna $pengguna)
    {
        Pengguna::where('id', $pengguna->id)
            ->update([
                'req_akses' => 'UBAH',

            ]);
        return redirect('/superadmin/datapengguna')->with('status', 'Permintaan Akses Telah Dikirim!');
    }

    public function req_akses_delete(Pengguna $pengguna)
    {
        Pengguna::where('id', $pengguna->id)
            ->update([
                'req_akses' => 'HAPUS',

            ]);
        return redirect('/superadmin/datapengguna')->with('status', 'Permintaan Akses Telah Dikirim!');
    }
}
