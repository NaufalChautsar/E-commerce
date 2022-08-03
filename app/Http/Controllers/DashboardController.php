<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pesanan;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        $barangs = Barang::all();
        return view('Admin.Dashboard.Dashboards', compact('barangs', 'pesanans'));
    }
}
