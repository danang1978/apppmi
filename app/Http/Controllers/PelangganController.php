<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PelangganModel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Maatwebsite\Excel\Facades\Excel;

class PelangganController extends Controller
{
   
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = PelangganModel::where('nama_pelanggan','LIKE','%' .$request->search. '%')->paginate(5);
        }else {
            $data = PelangganModel::paginate(5);
        }

return view('v_pelanggan', compact('data'));

    }
public function exportexcel(){
    return Excel::download(new PelangganExport, 'datapelanggan-'.Carbon::now()->timestamp.'.xlsx');
}

public function importexcel(Request $request){
    $data = $request->file('file');

    $namafile = $data->getClientOriginalName();
    $data->move('PelanganData', $namafile);

    Excel::import(new PelangganImport, \public_path('/PelanganData/'.$namafile) );
    return \redirect()->back();
}


}
