<?php

namespace App\Http\Controllers;

use App\Models\AdminKtgr;
use Illuminate\Http\Request;

class AdminKtgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $kategori = AdminKtgr::where('nama_ktgr', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else {
            $kategori = AdminKtgr::all();
        }

        return view('admin.kategori.ktgr', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.bk1');
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
            'nama_ktgr' => 'required',
        ]);

        AdminKtgr::create([
            'nama_ktgr' => $request->nama_ktgr,
            'req_akses' => 'NORMAL',
            'akses' => 'BELUM'
        ]);

        return redirect('/admin/kategori')->with('status', 'Kategori Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminKtgr  $adminKtgr
     * @return \Illuminate\Http\Response
     */
    public function show(AdminKtgr $adminKtgr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminKtgr  $adminKtgr
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminKtgr $adminKtgr)
    {
        return view('admin.kategori.ek1', compact('adminKtgr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminKtgr  $adminKtgr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminKtgr $adminKtgr)
    {
        if ($adminKtgr->akses == 'SETUJU'){ 
            $request->validate([
                'nama_ktgr' => 'required',
            ]);

            AdminKtgr::where('id', $adminKtgr->id)
            ->update([
                'nama_ktgr' => $request->nama_ktgr,
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM'
            ]);

            return redirect('/admin/kategori')->with('status', 'Kategori Berhasil Diubah!');
        }
        else {
            return redirect('/admin/kategori')->with('status1', 'Anda Tidak Memiliki Akses!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminKtgr  $adminKtgr
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminKtgr $adminKtgr)
    {
        AdminKtgr::destroy($adminKtgr->id);
        return redirect('/admin/kategori')->with('status', 'Kategori Berhasil Dihapus!');
    }

    public function req_akses_edit(AdminKtgr $adminKtgr)
    {
        AdminKtgr::where('id', $adminKtgr->id)
            ->update([
                'req_akses' => 'UBAH',

            ]);
        return redirect('/admin/kategori')->with('status', 'Permintaan Akses Telah Dikirim!');
        
    }

    public function req_akses_delete(AdminKtgr $adminKtgr)
    {
        AdminKtgr::where('id', $adminKtgr->id)
            ->update([
                'req_akses' => 'HAPUS',

            ]);
        return redirect('/admin/kategori')->with('status', 'Permintaan Akses Telah Dikirim!');
        
    }
}
