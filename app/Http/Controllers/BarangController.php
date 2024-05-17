<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('transaksi.transaksi', compact('barangs'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        return view('transaksi.transaksi_add', compact('kategoris','satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required|unique:barangs,nama_barang',
            'kategori_barang' => 'required',
            'jumlah' => 'required|numeric',
            'satuan_barang' => 'required',
        ]);

        $barangs=Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' =>  $request->nama_barang,
            'kategoris_id' =>  $request->kategori_barang,
            'jumlah' =>  $request->jumlah,
            'satuans_id' =>  $request->satuan_barang,
            'status_barang'=>1,
        ]);

        Transaksi::create([
            'barangs_id'=>$barangs->id,
            'tanggal_transaksi'=>'1',
            'faktur'=>'1',
            'jumlah'=>$request->jumlah,
            'status_transaksi'=>1,
            'users_id'=>1,
        ]);

        return redirect()->route('transaksimasuk.index')->with('success', 'Data barang berhasil ditambahkan.!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
