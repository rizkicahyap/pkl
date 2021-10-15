<?php

namespace App\Http\Controllers;

use App\Models\AdminFS1;
use App\Models\AdminSM1;
use App\Models\AdminKtgr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminFS1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $format_surat = AdminFS1::all();
        return view('admin.formatsurat1.fs1', compact('format_surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = AdminKtgr::all();
        return view('admin.formatsurat1.bf1', compact('kategori'));
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
            'keterangan' => 'nullable',
            'filename' => ['required','mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        ]);

        if ($request->hasfile('filename')) {
            $destination = "UploadFileFS1";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
        }

        AdminFS1::create([
            'id_kategori' => $request->id_kategori,
            'judul_format' => $request->judul_format,
            'keterangan' => $request->keterangan,
            'filename' => $filename->getClientOriginalName()
        ]);

        return redirect('/admin/formatsurat')->with('status', 'Format Surat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminFS1  $adminFS1
     * @return \Illuminate\Http\Response
     */
    public function show(AdminFS1 $adminFS1)
    {

        return view('admin.formatsurat1.sf1', compact('adminFS1'));
    }

    public function show2($file)
    {
        return response()->file('UploadFileFS1/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminFS1  $adminFS1
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminFS1 $adminFS1)
    {
        $kategori = AdminKtgr::all();
        return view('admin.formatsurat1.ef1', compact('adminFS1', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminFS1  $adminFS1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminFS1 $adminFS1)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul_format' => 'required',
            'keterangan' => 'nullable',
            'filename' => ['nullable','mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
        ]);

        if ($request->hasfile('filename')) {
            $destination = "UploadFileFS1";
            $filename = $request->file('filename');
            $filename->move($destination, $filename->getClientOriginalName());
        

            AdminFS1::where('id', $adminFS1->id)
            ->update([
                'id_kategori' => $request->id_kategori,
                'judul_format' => $request->judul_format,
                'keterangan' => $request->keterangan,
                'filename' => $filename->getClientOriginalName()]);
        }
        else{
            AdminFS1::where('id', $adminFS1->id)
            ->update([
                'id_kategori' => $request->id_kategori,
                'judul_format' => $request->judul_format,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect('/admin/formatsurat')->with('status', 'Format Surat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminFS1  $adminFS1
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminFS1 $adminFS1)
    {
        AdminFS1::destroy($adminFS1->id);
        return redirect('/admin/formatsurat')->with('status', 'Format Surat Berhasil Dihapus!');
    }
}
