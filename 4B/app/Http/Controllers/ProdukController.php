<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Produk;
use App\Importir;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProduk()
    {
        $produk = Produk::with('importir')->OrderBy('id', 'desc')->paginate(6);
        // $importir = Importir::all();
        return view('produk.index', compact('produk'));
    }

    public function index()
    {
        $produk = Produk::with('importir')->OrderBy('id', 'desc')->paginate(6);
        // $importir = Importir::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $importir = Importir::all();
        return view('produk.create', compact('importir'));
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
            'name' =>  'required|min:3',
            'importir' =>  'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'required',
            'price' => 'required|numeric',
        ]);

        $photo = $request->file('photo');
        if ($photo) {
            $name = Str::slug($request->name) . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('assets/img');
            $photo->move($destinationPath, $name);
        }

        $produk = new Produk;
        $produk->name = $request->name;
        $produk->importir_id = $request->importir;
        $produk->photo = $name;
        $produk->qty = $request->qty;
        $produk->price = $request->price;

        if ($produk->save()) {
            return redirect('/')->with('message-success', 'Berhasil Menambahkan Data ');
        } else {
            return redirect()->back()->with('message-danger', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dec = decrypt($id);
        $produk = Produk::find($dec);
        $importir = Importir::all();
        return view('produk.detail', compact('produk', 'importir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dec = decrypt($id);
        $produk = Produk::findOrFail($dec);
        $importir = Importir::all();
        return view('produk.edit', compact('produk', 'importir'));
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
            'name' =>  'required|min:3',
            'importir' =>  'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'required',
            'price' => 'required|numeric',
        ]);

        $dec = decrypt($id);
        $produk = Produk::findOrFail($dec);

        $photo = $request->file('photo');
        if ($photo) {
            $name = str::Slug($request->name) . '.' . $photo->getClientOriginalExtension();
            $location = public_path('/assets/img');
            $photo->move($location, $name);
            $oldImage = $produk->photo;
            Storage::delete($oldImage);
            $produk->photo = $name;
        }

        $produk->name = $request->name;
        $produk->importir_id = $request->importir;
        $produk->qty = $request->qty;
        $produk->price = $request->price;

        if ($produk->save()) {
            return redirect('/produk')->with('message-success', 'Berhasil Merubah Data');
        } else {
            return redirect()->back()->with('message-danger', 'Gagal Merubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $photo = $produk->photo;
        Storage::delete($photo);

        if ($produk->delete()) {
            return redirect('/produk')->with('message-success', 'Berhasil Menghapus Data');
        }
    }
}
