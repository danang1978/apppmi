<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualanModel extends Model
{
    public function allData()
    {

        return DB::table('tbl_penjualan')
       ->leftJoin('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan', '=', 'tbl_penjualan.id_penjualan')
       ->get();

    }

    
}
