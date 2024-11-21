<?php

namespace App\Http\Mod\Ordenes\Repositories;

use App\Http\Mod\Ordenes\Model\Ordenes;

class OrdenesRepository{
    public function CrearOrden(array $data)
    { 
        return Ordenes::create($data);
    }

    public function ListarOrdenes(){
        $listar = Ordenes::select('user_id', 'mesa_id',  'estado', 'created_at', 'updated_at')
        ->with(['UserRelation:id,name,email',  'TableRelation:id,sillas,estado'])
        ->get();
        return $listar;
    }

    public function EditarOrden($id, array $data)
{
    $mesa = Ordenes::findOrFail($id);
    $mesa->update($data);

    return $mesa;
}
}
