<?php

namespace App\Http\Controllers;

use App\Models\AdminSM1;
use App\Models\AdminKtgr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminSM1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surat_masuk = AdminSM1::all();
        return view('admin.datasurat1.sm1', compact('surat_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = AdminKtgr::all();
        return view('admin.datasurat1.bs1', compact('kategori'));
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
        
        AdminSM1::create([
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

        // AdminSM1::create($request->all());
        // $request->file('file')->store('file');
      
        return redirect('/admin/datasurat')->with('status', 'Surat Berhasil Ditambahkan!');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminSM1  $adminSM1
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return response()->file('UploadFileSM1/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSM1  $adminSM1
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSM1 $adminSM1)
    {
        $kategori = AdminKtgr::all();
        return view('admin.datasurat1.es1', compact('adminSM1', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSM1  $adminSM1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSM1 $adminSM1)
    {
        if ($adminSM1->akses == 'SETUJU'){ 
            $request->validate([
                'no_surat' => 'required',
                'perihal' => 'required',
                'tgl_surat' => 'required|before:tomorrow',
                'tgl_diterima' => 'required|before:tomorrow',
                'id_kategori' => 'required',
                'filename' => ['nullable','mimetypes:image/*,application/pdf'],
            ]);
        
            if ($request->hasfile('filename')) {
                $destination = "UploadFileSM1";
                $filename = $request->file('filename');
                $filename->move($destination, $filename->getClientOriginalName());

                AdminSM1::where('id', $adminSM1->id)
                ->update([
                    'no_surat' => $request->no_surat,
                    'perihal' => $request->perihal,
                    'tgl_surat' => $request->tgl_surat,
                    'tgl_diterima' => $request->tgl_diterima,
                    'filename' => $filename->getClientOriginalName(),
                    'id_kategori' => $request->id_kategori,
                    'sts_surat' => $request->sts_surat,
                    'req_akses' => 'NORMAL',
                    'akses' => 'BELUM'
                ]);
            }

            else{
                AdminSM1::where('id', $adminSM1->id)
                    ->update([
                        'no_surat' => $request->no_surat,
                        'perihal' => $request->perihal,
                        'tgl_surat' => $request->tgl_surat,
                        'tgl_diterima' => $request->tgl_diterima,
                        'id_kategori' => $request->id_kategori,
                        'sts_surat' => $request->sts_surat,
                        'req_akses' => 'NORMAL',
                        'akses' => 'BELUM'
                    ]);
            }

            return redirect('/admin/datasurat')->with('status', 'Surat Berhasil Diubah!');
        }
        else {
            return redirect('/admin/datasurat')->with('status1', 'Anda Tidak Memiliki Akses!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminSM1  $adminSM1
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSM1 $adminSM1)
    {
        AdminSM1::destroy($adminSM1->id);
        return redirect('/admin/datasurat')->with('status', 'Surat Berhasil Dihapus!');
        
    }

    public function req_akses_edit(AdminSM1 $adminSM1)
    {
        AdminSM1::where('id', $adminSM1->id)
            ->update([
                'req_akses' => 'UBAH',

            ]);
        return redirect('/admin/datasurat')->with('status', 'Permintaan Akses Telah Dikirim!');
        
    }

    public function req_akses_delete(AdminSM1 $adminSM1)
    {
        AdminSM1::where('id', $adminSM1->id)
            ->update([
                'req_akses' => 'HAPUS',

            ]);
        return redirect('/admin/datasurat')->with('status', 'Permintaan Akses Telah Dikirim!');
        
    }
}
