<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('Admin.Produk.Produks', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Produk.Add');
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
            'nama_barang' => 'required|max:25',
            'harga' => 'required|integer|max:999999',
            'stok' => 'required|max:9999',
            'foto' => 'required|image',
            'keterangan' => 'max:255',
        ], [
            'nama_barang.required' => 'Nama produk tidak boleh kosong',
            'nama_barang.max' => 'Nama produk tidak boleh lebih dari 25 characters',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.integer' => 'Harga harus angka',
            'harga.max' => 'Harga maksimal Rp.999999',
            'stok.max' => 'Stok maksimal 9999',
            'stok.required' => 'Stok produk tidak boleh kosong',
            'keterangan.max' => 'Maksimal karakter 255',
            'foto.required' => 'Foto produk tidak boleh kosong',
            'foto.image' => 'File harus berbentuk png'
        ]);

        $barangs = new Barang([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request
                ->file('foto')->getClientOriginalName());
            $barangs->foto = $request->file('foto')
                ->getClientOriginalName();
            $barangs->save();
        }

        return redirect()->route('Produks.index')
            ->with('status', 'Data Berhasil Ditambah!');

        // $img = $request->file('foto');
        // $new_image_name = rand() . '.' . $img->getClientOriginalExtension();
        // $img->move(public_path('images'), $new_image_name);
        // Barang::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangs = Barang::find($id);
        return view('Admin.Produk.Show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::find($id);
        return view('Admin.Produk.Edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|max:25',
            'harga' => 'required|integer|max:999999',
            'stok' => 'required',
            'foto' => 'required|image',
            'keterangan' => 'max:255',
        ], [
            'nama_barang.required' => 'Nama produk tidak boleh kosong',
            'nama_barang.max' => 'Nama produk tidak boleh lebih dari 25 characters',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.integer' => 'Harga harus angka',
            'harga.max' => 'Harga maksimal Rp.999999',
            'stok.required' => 'Stok produk tidak boleh kosong',
            'keterangan.max' => 'Maksimal karakter 255',
            'foto.required' => 'Foto produk tidak boleh kosong',
            'foto.image' => 'File harus berbentuk png'
        ]);
        $barangs = Barang::find($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan,
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request
                ->file('foto')->getClientOriginalName());
            $barangs->foto = $request->file('foto')
                ->getClientOriginalName();
            $barangs->save();
        }
        return redirect()->route('Produks.index')
            ->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = Barang::find($id);
        $barangs->delete();
        return redirect()->route('Produks.index')
            ->with('status', 'Data Berhasil Dihapus!');
    }
}
