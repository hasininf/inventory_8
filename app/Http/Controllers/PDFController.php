<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();

        $laporans = DB::table('transaksis')
        ->join('barangs', 'transaksis.barangs_id', '=', 'barangs.id')
        ->join('kategoris', 'barangs.kategoris_id', '=', 'kategoris.id')
        ->join('satuans', 'barangs.satuans_id', '=', 'satuans.id')
        ->select('transaksis.*', 'barangs.kode_barang', 'barangs.nama_barang', 'kategoris.kategori', 'satuans.satuan')
        ->get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $laporans
        ];

        $pdf = PDF::loadView('laporan.myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
