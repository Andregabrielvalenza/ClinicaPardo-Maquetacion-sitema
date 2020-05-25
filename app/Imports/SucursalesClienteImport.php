<?php

namespace App\Imports;

use App\SucursalCliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SucursalesClienteImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new SucursalCliente([
            'direccion' => $row['av'],
            'numero' => $row['numero'],
            'telefono' => $row['telefono'],
            'email' => $row['correo'],
            'nombres_representante_legal' => $row['nombrerl'],
            'dni_representante_legal' => $row['dnirl'],
            'nombres_responsable_tecnico' => $row['nombrert'],
            'dni_responsable_tecnico' => $row['dnirt'],
            'distrito_id' => $row['distrito'],
            'cliente_id' => $row['cliente']
        ]);
    }
}
