<?php

namespace App\Http\Controllers;

use App\Models\DirSM1;
use App\Models\DirKtgr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DirSM1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = DirSM1::all();
        return view('direksi.datasurat1.sm1', compact('surat_masuk'));
    }

    public function index2()
    {
        $surat_masuk = DirSM1::all();
        return view('direksi.akses.asm1', compact('surat_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DirKtgr::all();
        return view('direksi.datasurat1.bs1', compact('kategori'));
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
            'no_surat' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'tgl_diterima' => 'required',
            'id_kategori' => 'required',
            'filename' => 'required',
        ]);
    
        if ($request->hasfile('filename')) {
            $destination = "UploadFileSM1";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
        }


        DirSM1::create([
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'tgl_surat' => $request->tgl_surat,
            'tgl_diterima' => $request->tgl_diterima,
            'filename' => $filename->getClientOriginalName(),
            'id_kategori' => $request->id_kategori,
            'sts_surat' => $request->sts_surat,
            'user_id' => auth()->id(),
            'req_akses' => 'NORMAL',
            'akses' => 'BELUM'
        ]);

        return redirect('/direksi/datasurat')->with('status', 'Surat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DirSM1  $dirSM1
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return response()->file('UploadFileSM1/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DirSM1  $dirSM1
     * @return \Illuminate\Http\Response
     */
    public function edit(DirSM1 $dirSM1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DirSM1  $dirSM1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DirSM1 $dirSM1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DirSM1  $dirSM1
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirSM1 $dirSM1)
    {
        //
    }

    public function TERIMA(DirSM1 $dirSM1)
    {
        DirSM1::where('id', $dirSM1->id)
            ->update([
                'akses' => 'SETUJU',
            ]);
        return redirect('/direksi/akses/datasurat')->with('status', 'Akses Diberikan!');
        
    }

    public function TOLAK(DirSM1 $dirSM1)
    {
        DirSM1::where('id', $dirSM1->id)
            ->update([
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
            ]);
        return redirect('/direksi/akses/datasurat')->with('status', 'Permintaan Akses Ditolak!');
        
    }
}
