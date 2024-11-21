<?php

namespace App\Http\Mod\Platos\Controller;

use App\Http\Controllers\Controller;
use App\Http\Mod\Platos\Repositories\PlatosRepository;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
    public function __construct(private PlatosRepository $platosRepository)
    {
    }

    public function CrearPlatos(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]);

        $cat = $this->platosRepository->CrearPlatos($validatedData);

        return response()->json([
            'message' => 'Mesa creada con éxito',
            'description' => $cat,
        ], 201);
    }


    public function ListarPlatos(Request $request)
    {
        try {
            $listar = $this->platosRepository->ListarPlatos();
            return response()->json($listar);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function EditarPlato(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sillas' => 'required',
            'estado' => 'required',
        ]);

        try {
            $platoActualizada = $this->platosRepository->EditarPlato($id, $validatedData);

            return response()->json([
                'message' => 'Mesa actualizada con éxito',
                'data' => $platoActualizada,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error al actualizar la mesa',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
