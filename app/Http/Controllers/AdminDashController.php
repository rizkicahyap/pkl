<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminDash;
use App\Models\AdminKtgr;


class AdminDashController extends Controller
{
    public function index()
    {
        $dashboard = AdminDash::all();
        $kategori = AdminKtgr::withCount('jml')->get();
        return view('admin.dashboard', compact('dashboard', 'kategori'));
    }

}
