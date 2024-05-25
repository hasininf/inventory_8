<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
       $barangs = Barang::where('jumlah', '<', 10)->paginate(10);;


        return view('dashboard', compact('barangs'))->with('no',1)->with('title','Data Barang')->with('id',0);
    }
}
