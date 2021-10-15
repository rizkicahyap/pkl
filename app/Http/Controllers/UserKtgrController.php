<?php

namespace App\Http\Controllers;

use App\Models\UserKtgr;
use Illuminate\Http\Request;

class UserKtgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $kategori = UserKtgr::where('nama_ktgr', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else {
            $kategori = UserKtgr::all();
        }

        return view('user.kategori.ktgr', compact('kategori'));
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
     * @param  \App\Models\UserKtgr  $userKtgr
     * @return \Illuminate\Http\Response
     */
    public function show(UserKtgr $userKtgr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserKtgr  $userKtgr
     * @return \Illuminate\Http\Response
     */
    public function edit(UserKtgr $userKtgr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserKtgr  $userKtgr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserKtgr $userKtgr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserKtgr  $userKtgr
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserKtgr $userKtgr)
    {
        //
    }
}
