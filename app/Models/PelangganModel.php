<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PelangganModel extends Model
{
    protected $table = "tbl_pelanggan";
    protected $fillable =[
        'nama_pelanggan',
    ];
    

    // public function allData()
    // {

    //    return DB::table('tbl_pelanggan')->get();

    // }
}
