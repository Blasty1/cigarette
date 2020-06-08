<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[2],
            'prezzo' => $row[4],
            'codice' => $row[1],
            'Grammi/Pezzi' => '20',
            'img' => 'okokkok',
            'id_category' => 1
        ]);
    }
}
