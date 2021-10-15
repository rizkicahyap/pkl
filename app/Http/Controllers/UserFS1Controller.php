<?php

namespace App\Http\Controllers;

use App\Models\UserFS1;
use App\Models\UserSM1;
use App\Models\UserKtgr;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserFS1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $format_surat = UserFS1::all();
        return view('user.formatsurat1.u_fs1', compact('format_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = UserKtgr::all();
        return view('user.formatsurat1.bf1', compact('kategori'));
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
            'id_kategori' => 'required',
            'judul_format' => 'required',
            'filename' => 'required',
        ]);

        if ($request->hasfile('filename')) {
            $destination = "UploadFileFS1";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
        }

        UserFS1::create([
            'id_kategori' => $request->id_kategori,
            'judul_format' => $request->judul_format,
            'keterangan' => $request->keterangan,
            'filename' => $filename->getClientOriginalName(),
            'user_id' => auth()->id()
        ]);

        return redirect('/user/formatsurat')->with('status', 'Format Surat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFS1  $userFS1
     * @return \Illuminate\Http\Response
     */
    public function show(UserFS1 $userFS1)
    {
        return view('user.formatsurat1.sf1', compact('userFS1'));
    }

    public function show2($file)
    {
        return response()->file('UploadFileFS1/'.$file);
    }

}
