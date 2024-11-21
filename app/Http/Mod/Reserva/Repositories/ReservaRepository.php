<?php

namespace App\Http\Mod\Reserva\Repositories;

use App\Http\Mod\Reserva\Model\Reserva;

class ReservaRepository{
    public function CrearReserva(array $data)
    { 
        return Reserva::create($data);
    }

    public function ListarReservas(){
        $listar = Reserva::select('usuario_id', 'mesa_id',  'estado', 'fecha_reserva', 'created_at', 'updated_at')
        ->with(['UserRelation:id,name,email',  'TableRelation:id,sillas,estado'])
        ->get();
        return $listar;
    }

    public function EditarReserva($id, array $data)
{
    $mesa = Reserva::findOrFail($id);
    $mesa->update($data);

    return $mesa;
}
}
