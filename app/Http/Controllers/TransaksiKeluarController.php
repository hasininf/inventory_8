<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $barangs=Barang::all();
            return view('transaksikeluar.transaksi_add', compact('barangs'));
        // return view('transaksikeluar.tes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getBarang(Request $request) {
         $productCode = $request->input('product_code');
        // Contoh pencarian produk berdasarkan kode barang
        // $product = Barang::where('kode_barang', $productCode)->first();
        $product = Barang::join('kategoris', 'barangs.kategoris_id', '=', 'kategoris.id')
                 ->join('satuans', 'barangs.satuans_id', '=', 'satuans.id')
                 ->select('barangs.*', 'kategoris.kategori', 'satuans.satuan')
                 ->where('barangs.kode_barang', $productCode)
                 ->first();

        if ($product) {
            // Menyesuaikan dengan respons yang diharapkan
            return response($product)->header('Content-Type', 'application/json');
        } else {
            return response("Product not found")->header('Content-Type', 'application/json');
        }
    }
}
