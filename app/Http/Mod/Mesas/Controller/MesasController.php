<?php

namespace App\Http\Mod\Mesas\Controller;

use App\Http\Controllers\Controller;
use App\Http\Mod\Mesas\Repositories\MesasRepository;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    public function __construct(private MesasRepository $mesasRepository)
    {
    }

    public function CrearMesas(Request $request)
    {
        $validatedData = $request->validate([
            'sillas' => 'required',
            'estado' => 'required',
        ]);

        $cat = $this->mesasRepository->CrearMesas($validatedData);

        return response()->json([
            'message' => 'Mesa creada con éxito',
            'description' => $cat,
        ], 201);
    }


    public function ListarMesas(Request $request)
    {
        try {
            $listar = $this->mesasRepository->ListarMesas();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarMesa(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'sillas' => 'required',
            'estado' => 'required',
        ]);

        // Intentar actualizar la mesa
        try {
            $mesaActualizada = $this->mesasRepository->EditarMesa($id, $validatedData);

            return response()->json([
                'message' => 'Mesa actualizada con éxito',
                'data' => $mesaActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar la mesa',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
