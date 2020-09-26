<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Importir;

class ImportirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importir = Importir::OrderBy('id', 'asc')->latest()->paginate(5);
        return view('importir.index', compact('importir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('importir.create');
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
            'address' => 'required',
            'phone' => 'required',
        ]);

        $importir = new Importir;
        $importir->name = $request->name;
        $importir->address = $request->address;
        $importir->phone = $request->phone;

        if ($importir->save()) {
            return redirect('/importir')->with('message-success', 'Berhasil Menambahkan Data ');
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
        $importir = Importir::findOrFail($dec);
        return view('importir.detail', compact('importir'));
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
        $importir = Importir::findOrFail($dec);
        return view('importir.edit', compact('importir'));
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
            'address' => 'required',
            'phone' => 'required|max:15',
        ]);

        $dec = decrypt($id);
        $importir = Importir::findOrFail($dec);
        $importir->name = $request->name;
        $importir->address = $request->address;
        $importir->phone = $request->phone;

        if ($importir->save()) {
            return redirect('/importir')->with('message-success', 'Berhasil Merubah Data ');
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
        $dec = decrypt($id);
        $importir = Importir::findOrFail($dec)->delete();

        return redirect()->back()->with('message-success', 'Berhasil Menghapus Data');
    }
}
