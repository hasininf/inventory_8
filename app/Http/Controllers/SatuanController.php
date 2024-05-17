<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuans = Satuan::all();
        return view('satuan.satuan', compact('satuans'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.satuan_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satuan'=> 'required|unique:satuans,satuan',
        ]);

        Satuan::create([
            'satuan'=>$request->satuan,
            'status_satuan'=>1,
        ]);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('satuan.satuan_edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'satuan'=> 'required|unique:satuans,satuan',
        ]);

        $satuan->update([
            'satuan'=>$request->satuan,
        ]);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus');
    }
}
