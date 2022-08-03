<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('FrontEnd.Profile', compact('users'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
            'nohp' => 'required',
            'alamat' => 'required|max:255',
        ], [
            'nohp.required' => 'No handphone tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter'
        ]);
        $users = User::find($id);
        $users->update([
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);
        return redirect('/Profile')
            ->with('status', 'Data berhasil diupdate!');
    }
}
