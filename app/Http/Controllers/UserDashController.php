<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDash;
use App\Models\UserKtgr;

class UserDashController extends Controller
{
    public function index()
    {
        $dashboard = UserDash::all();
        $kategori = UserKtgr::withCount('jml')->get();
        return view('user.dashboard', compact('dashboard', 'kategori'));
    }
}
