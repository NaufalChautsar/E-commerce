<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pesanan;
use App\PesananDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index($id)
    {
        $barangs = Barang::where('id', $id)->first();
        return view('FrontEnd.ShopDetail', compact('barangs'));
    }

    public function checkout()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('FrontEnd.Cart', compact('pesanan', 'pesanan_details'));
        }
        return redirect('/')->with('status', 'Anda berhasil melakukan check out, 
            Terimakasih sudah belanja di K-Style Outlet');
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();

        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga - $pesanan->kode;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('/Check-Out')
            ->with('status', 'Pesanan berhasil di cancel');
    }

    public function konfirmasi(Request $request)
    {
        $users = User::where('id', Auth::user()->id)->first();
        if (empty($users->alamat)) {
            return redirect('/Profile')
                ->with('status biodata', 'Silahkan lengkapi biodata terlebih dahulu!');
        }
        if (empty($users->nohp)) {
            return redirect('/Profile')
                ->with('status biodata', 'Silahkan lengkapi biodata terlebih dahulu!');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barangs = Barang::where('id', $pesanan_detail->barang->id)->first();
            $barangs->stok = $barangs->stok - $pesanan_detail->jumlah;
            $barangs->update();
        }
        return redirect('/History/' . $pesanan_id)
            ->with('status', 'Pesanan berhasil di check out');
    }

    public function pesan(Request $request, $id)
    {
        //Validasi
        $request->validate([
            'jumlah_pesan' => 'required',
            'size' => 'required|in:M,L,LL,XL,XXL'
        ], [
            'jumlah_pesan.required' => 'Jumlah Pesanan Harus Disi.',
            'size.required' => 'Ukuran Celana Harus Dipilih!'
        ]);

        $barangs = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        if ($request->jumlah_pesan > $barangs->stok) {
            return redirect('Pesan/' . $barangs->id)
                ->with('status', 'Pesanan melebihi Stok!');
        }

        //Cek Pesanan
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //Pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->ongkir = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        //Pesanan Detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cek_pesanan_detail = PesananDetail::where('barang_id', $barangs->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barangs->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->size = $request->size;
            $pesanan_detail->jumlah_harga = $barangs->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barangs->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            //Harga pesanan
            $harga_pesanan_detail_baru = $barangs->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga =  $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //Total harga
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barangs->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/')
            ->with('status', 'Barang Anda Sudah Masuk Keranjang!');
    }
}
