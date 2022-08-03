<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Barang;
use App\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        return view('FrontEnd.History', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan_konfirmasi = Pesanan::where('id', $id)->where('ongkir', 0)->first();
        if ($pesanan_konfirmasi == null) {
            $pesanan = Pesanan::where('id', $id)->first();
            $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('FrontEnd.HistoryDetail', compact('pesanan', 'pesanan_detail'));
        } else {
            return view('FrontEnd.KonfirmasiAdmin');
        }
    }
}
