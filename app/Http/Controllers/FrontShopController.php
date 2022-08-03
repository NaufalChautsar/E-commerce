<?php

namespace App\Http\Controllers;

use App\Barang;

class FrontShopController extends Controller
{
    public function index()
    {
        $barangs = Barang::paginate(6);
        return view('FrontEnd.Shop', compact('barangs'));
    }
}
