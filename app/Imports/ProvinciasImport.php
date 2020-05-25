<?php

namespace App\Imports;

use App\Provincia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ProvinciasImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Provincia([
            'departamento_id' => $row[0],
            'nombre' => $row[1]
        ]);
    }
}
