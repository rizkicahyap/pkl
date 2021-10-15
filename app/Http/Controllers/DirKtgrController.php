<?php

namespace App\Http\Controllers;

use App\Models\DirKtgr;
use Illuminate\Http\Request;

class DirKtgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $kategori = DirKtgr::where('nama_ktgr', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else {
            $kategori = DirKtgr::all();
        }

        return view('direksi.kategori.ktgr', compact('kategori'));
    }

    public function index2(Request $request)
    {
        $kategori = DirKtgr::all();
        return view('direksi.akses.ak1', compact('kategori'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirKtgr  $dirKtgr
     * @return \Illuminate\Http\Response
     */
    public function show(DirKtgr $dirKtgr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirKtgr  $dirKtgr
     * @return \Illuminate\Http\Response
     */
    public function edit(DirKtgr $dirKtgr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DirKtgr  $dirKtgr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DirKtgr $dirKtgr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirKtgr  $dirKtgr
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirKtgr $dirKtgr)
    {
        //
    }

    public function TERIMA(DirKtgr $dirKtgr)
    {
        DirKtgr::where('id', $dirKtgr->id)
            ->update([
                'akses' => 'SETUJU',
            ]);
        return redirect('/direksi/akses/kategori')->with('status', 'Akses Diberikan!');
        
    }

    public function TOLAK(DirKtgr $dirKtgr)
    {
        DirKtgr::where('id', $dirKtgr->id)
            ->update([
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
            ]);
        return redirect('/direksi/akses/kategori')->with('status', 'Permintaan Akses Ditolak!');
        
    }
}
