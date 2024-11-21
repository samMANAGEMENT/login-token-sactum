<?php

namespace App\Http\Mod\Reserva\Controller;

use App\Http\Controllers\Controller;
use App\Http\Mod\Reserva\Repositories\ReservaRepository;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct(private ReservaRepository $reservaRepository)
    {
    }

    public function CrearReserva(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required',
            'mesa_id' => 'required',
            'fecha_reserva' => 'required',
            "estado" => 'required',
            'canal' => 'required'
        ]);

        $cat = $this->reservaRepository->CrearReserva($validatedData);

        return response()->json([
            'message' => 'Reserva creada con éxito',
            'description' => $cat,
        ], 201);
    }


    public function ListarReservas(Request $request)
    {
        try {
            $listar = $this->reservaRepository->ListarReservas();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarReserva(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'usuario_id' => 'required',
            'mesa_id' => 'required',
            'fecha_reserva' => 'required',
            "estado" => 'required',
            'canal' => 'required'
        ]);

        // Intentar actualizar la mesa
        try {
            $mesaActualizada = $this->reservaRepository->EditarReserva($id, $validatedData);

            return response()->json([
                'message' => 'Reserva actualizada con éxito',
                'data' => $mesaActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar la Reserva',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
