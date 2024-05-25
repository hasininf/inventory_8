<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
            'tanggal_transaksi'=>date('Y-m-d H:i:s'),
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
    function getBarang(Request $request)  {
         $productCode = $request->input('product_code');
        // Contoh pencarian produk berdasarkan kode barang
        $product = Barang::where('kode_barang', $productCode)->first();

        if ($product) {
            // Menyesuaikan dengan respons yang diharapkan
            return response($product->namabarang)->header('Content-Type', 'application/x-some-custom-type');
        } else {
            return response("Product not found")->header('Content-Type', 'application/x-some-custom-type');
        }
    }
}
