<?php

namespace App\Imports;

use App\Models\PelangganModel;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PelangganModel([
            'nama_pelanggan' => $row[1],
        ]);
    }
}
