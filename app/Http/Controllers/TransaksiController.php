<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
