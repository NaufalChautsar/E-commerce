<?php

namespace App\Http\Controllers;

use App\Barang;

class FrontHomeController extends Controller
{
    public function index()
    {
        $barangs = Barang::paginate(10);
        return view('FrontEnd.Home', compact('barangs'));
    }
}
