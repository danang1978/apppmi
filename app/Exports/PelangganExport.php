<?php

namespace App\Exports;

use App\Models\PelangganModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelangganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PelangganModel::all();
    }
}
