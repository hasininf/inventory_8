<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index() {
        // $laporans = Transaksi::all();
        $laporans = DB::table('transaksis')
        ->join('barangs', 'transaksis.barangs_id', '=', 'barangs.id')
        ->join('kategoris', 'barangs.kategoris_id', '=', 'kategoris.id')
        ->join('satuans', 'barangs.satuans_id', '=', 'satuans.id')
        ->select('transaksis.*', 'barangs.kode_barang', 'barangs.nama_barang', 'kategoris.kategori', 'satuans.satuan')
        ->get();

        return view('laporan.laporan', compact('laporans'))->with('no',1)->with('title','Laporan');
    }
    public function laporanmasuk() {
        // $laporans = Transaksi::all();
        $laporans = DB::table('transaksis')
        ->join('barangs', 'transaksis.barangs_id', '=', 'barangs.id')
        ->join('kategoris', 'barangs.kategoris_id', '=', 'kategoris.id')
        ->join('satuans', 'barangs.satuans_id', '=', 'satuans.id')
        ->where('transaksis.status_transaksi',1)
        ->select('transaksis.*', 'barangs.kode_barang', 'barangs.nama_barang', 'kategoris.kategori', 'satuans.satuan')
        ->get();

        return view('laporan.laporan', compact('laporans'))->with('no',1)->with('title','Laporan Masuk');
    }
    public function laporankeluar() {
        // $laporans = Transaksi::all();
        $laporans = DB::table('transaksis')
        ->join('barangs', 'transaksis.barangs_id', '=', 'barangs.id')
        ->join('kategoris', 'barangs.kategoris_id', '=', 'kategoris.id')
        ->join('satuans', 'barangs.satuans_id', '=', 'satuans.id')
        ->where('transaksis.status_transaksi',2)
        ->select('transaksis.*', 'barangs.kode_barang', 'barangs.nama_barang', 'kategoris.kategori', 'satuans.satuan')
        ->get();

        return view('laporan.laporan', compact('laporans'))->with('no',1)->with('title','Laporan Keluar');
    }
}
