<?php

namespace App\Http\Modules\Mesas\Repositories;

use App\Http\Modules\Mesas\Models\Mesas;

class MesasRepository{
    public function CrearMesas(array $data)
    { 
        return Mesas::create($data);
    }

    public function ListarMesas()
    {
        return Mesas::select('id', 'sillas', 'estado')->paginate(10);
    }
}
