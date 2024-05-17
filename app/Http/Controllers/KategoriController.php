<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.kategori', compact('kategoris'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.kategori_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,kategori',
        ]);

        Kategori::create([
        'kategori' =>$request->nama_kategori,
        'status_kategori'=>1,
       ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');



    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.kategori_edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {

        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,kategori',
        ]);
        // dd($request->all());
        $kategori->update([
            'kategori' => $request->nama_kategori,
        ]);

                return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus!');
    }
}
