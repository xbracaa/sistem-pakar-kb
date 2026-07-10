<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kondisi;
use App\Models\MetodeKb;
use App\Models\Aturan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKondisi = Kondisi::count();
        $totalMetode = MetodeKb::count();
        $totalAturan = Aturan::count();

        return view('admin.dashboard', compact('totalKondisi', 'totalMetode', 'totalAturan'));
    }
}
