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
    public function store(Request $request, Barang $barangs)
    {
        $request->validate([
            'kode_barang' => 'required',
        ]);

         $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        if (!$barang) {
            return back()->withErrors(['kode_barang' => 'Kode barang tidak ditemukan.'])->withInput();
        }

        $stok = $barang->jumlah; // Misalnya kolom stok di tabel barang adalah 'stok'

        // Validasi lengkap dengan jumlah harus kurang dari atau sama dengan stok
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|numeric|min:1|max:' . $stok,
        ]);

         $barang->update([
        'jumlah' => $stok - $request->jumlah,
        ]);

        Transaksi::create([
            'barangs_id'=>$barang->id,
            'tanggal_transaksi'=>date('Y-m-d H:i:s'),
            'faktur'=>'INV-'.date('ymdhis'),
            'jumlah'=>$request->jumlah,
            'status_transaksi'=>2,
            'users_id'=>2,
        ]);
        return redirect()->route('transaksikeluar.index');
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
