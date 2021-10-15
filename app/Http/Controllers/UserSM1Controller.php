<?php

namespace App\Http\Controllers;

use App\Models\UserSM1;
use App\Models\UserKtgr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserSM1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = UserSM1::all();
        return view('user.datasurat1.u_sm1', compact('surat_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = UserKtgr::all();
        return view('user.datasurat1.bs1', compact('kategori'));
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
            'tgl_surat' => 'required|before:tomorrow',
            'tgl_diterima' => 'required|before:tomorrow',
            'id_kategori' => 'required',
            'filename' => ['required','mimetypes:image/*,application/pdf'],
        ]);
    
        if ($request->hasfile('filename')) {
            $destination = "UploadFileSM1";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
        }


        UserSM1::create([
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

        return redirect('/user/datasurat')->with('status', 'Surat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSM1  $userSM1
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return response()->file('UploadFileSM1/'.$file);
    }

    
}
