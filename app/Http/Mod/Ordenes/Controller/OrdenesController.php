<?php

namespace App\Http\Mod\Ordenes\Controller;

use App\Http\Controllers\Controller;
use App\Http\Mod\Ordenes\Repositories\OrdenesRepository;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function __construct(private OrdenesRepository $ordenesRepository)
    {
    }

    public function CrearOrden(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'mesa_id' => 'required',
            "estado" => 'required'
        ]);

        $cat = $this->ordenesRepository->CrearOrden($validatedData);

        return response()->json([
            'message' => 'Orden creada con éxito',
            'description' => $cat,
        ], 201);
    }


    public function ListarOrdenes(Request $request)
    {
        try {
            $listar = $this->ordenesRepository->ListarOrdenes();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarOrden(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'user_id' => 'required',
            'mesa_id' => 'required',
            'estado' => 'required',
        ]);

        // Intentar actualizar la mesa
        try {
            $mesaActualizada = $this->ordenesRepository->EditarOrden($id, $validatedData);

            return response()->json([
                'message' => 'Orden actualizada con éxito',
                'data' => $mesaActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar la Orden',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
