<?php

namespace App\Http\Controllers;

use App\PesananDetail;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        $pesanan_details = PesananDetail::all();
        return view('Admin.Transaksi.TransaksiDetail', compact('pesanan_details'));
    }
}
