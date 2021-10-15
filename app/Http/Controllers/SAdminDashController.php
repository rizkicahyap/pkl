<?php

namespace App\Http\Controllers;

use App\Models\SAdminDash;
use Illuminate\Http\Request;

class SAdminDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = SAdminDash::all();
        return view('superadmin.dashboard', compact('dashboard'));
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
     * @param  \App\Models\SAdminDash  $sAdminDash
     * @return \Illuminate\Http\Response
     */
    public function show(SAdminDash $sAdminDash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SAdminDash  $sAdminDash
     * @return \Illuminate\Http\Response
     */
    public function edit(SAdminDash $sAdminDash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SAdminDash  $sAdminDash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SAdminDash $sAdminDash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SAdminDash  $sAdminDash
     * @return \Illuminate\Http\Response
     */
    public function destroy(SAdminDash $sAdminDash)
    {
        //
    }
}
