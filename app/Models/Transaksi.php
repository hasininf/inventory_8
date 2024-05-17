<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangs_id',
        'tanggal_transaksi',
        'faktur',
        'jumlah',
        'status_transaksi',
        'users_id',
    ];
}
