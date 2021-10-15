<?php

namespace App\Http\Controllers;

use App\Models\DirDash;
use App\Models\AdminKtgr;
use Illuminate\Http\Request;

class DirDashController extends Controller
{
    public function index()
    {
        $dashboard = DirDash::all();
        $kategori = AdminKtgr::withCount('jml')->get();
        return view('direksi.dashboard', compact('dashboard', 'kategori'));
    }

   
}
