<?php

namespace App\Http\Mod\Platos\Repositories;

use App\Http\Mod\Platos\Model\Platos;

class PlatosRepository{
    public function CrearPlatos(array $data)
    { 
        return Platos::create($data);
    }

    public function ListarPlatos()
    {
        return Platos::select('nombre', 'descripcion', 'precio')->paginate(10);
    }

    public function EditarPlato($id, array $data)
{
    // Buscar la mesa por ID
    $plato = Platos::findOrFail($id);
    
    // Actualizar los campos
    $plato->update($data);

    return $plato;
}
}
